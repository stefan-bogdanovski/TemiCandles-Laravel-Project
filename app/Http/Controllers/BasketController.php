<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductToBasketRequest;
use App\Http\Requests\MakePurchaseRequest;
use App\Mail\Purchase_Mail;
use App\Models\Payment;
use App\Models\Product_Size;
use App\Models\Purchase_Order;
use App\Models\User_Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BasketController extends MainController
{
    protected const initialQuantity = 1;
    protected const initialDeliveryStatus = 'In progress';
    public function __construct()
    {
        parent::__construct();
        $this->data['payment_methods'] = $this->data['payment_methods'] = Payment::all();
        $this->data['total'] = 0;
    }

    public function index()
    {
        $userID = session()->get('user')->id;
        try {
            $this->data['productsInBasket'] = User_Basket::with('product')->where('user_id', $userID)
                ->where('purchase_order_id', null)
                ->get();
            foreach ($this->data['productsInBasket'] as $one)
            {
                $this->data['total'] += $one->quantity * $one->product->price;
            }
            return view('pages.cart', $this->data);
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
        }
        return view('pages.cart', $this->data);
    }
    public function add(AddProductToBasketRequest $request)
    {
        $userId = session()->get('user')->id;
        $productId = $request->input('productid');
        $sizeId = $request->input('sizeid');
        try {
            $productsize = Product_Size::where('product_id', $productId)
                ->where('size_id', $sizeId)
                ->first();
            $count = User_Basket::where('product_size_id', $productsize->id)
                ->where('user_id', $userId)
                ->count();
            if(!$count)
            {
                User_Basket::create([
                    'product_size_id' => $productsize->id,
                    'user_id' => $userId,
                    'quantity' => self::initialQuantity,
                    'status' => 'In basket'
                ]);
                return response('Uspešno ste dodali proizvod u Vašu korpu!', 200);
            }
            else{
                $quantity = User_Basket::where('product_size_id', $productsize->id)
                    ->where('user_id', $userId)
                    ->first()->quantity;
                User_Basket::where('product_size_id', $productsize->id)
                    ->where('user_id', $userId)
                    ->update([
                    'quantity' => ++$quantity
                ]);
                return response('Uspešno ste dodali proizvod u Vašu korpu!', 200);
            }
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            return abort(400);
        }
    }
    public function remove(Request $request)
    {
        $id = $request->input('id');
        try {
            User_Basket::destroy($id);
            return response('Uspešno ste obrisali proizvod iz korpe!');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            return abort(400);
        }
    }
    public function purchase(MakePurchaseRequest $request)
    {
        $paymentId = $request->input('placanje');
        $phone = $request->input('telefon');
        $opstina = $request->input('opstina');
        $grad = $request->input('grad');
        $adresa = $request->input('adresa');
        $total = $request->input('total');
        if($total == 0)
        {
           return response()->redirectToRoute('home');
        }
        $userId = session()->get('user')->id;
        try {
            $purchaseId = DB::table('purchase_order')->insertGetId([
                'payment_id' => $paymentId,
                'date' => date('Y-m-d H:i:s'),
                'phone' => $phone,
                'township' => $opstina,
                'city' => $grad,
                'address' => $adresa,
                'total' => $total,
                'delivery' => self::initialDeliveryStatus
            ]);
            $user_products = User_Basket::where('user_id', $userId)
                ->where('status', 'In basket')
                ->where('purchase_order_id', null)
                ->get();
            foreach($user_products as $one)
            {
                User_Basket::where('user_id', $userId)
                    ->where('status', 'In basket')
                    ->where('purchase_order_id', null)
                    ->update([
                        'purchase_order_id' => $purchaseId,
                        'status' => 'Ordered',
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
            }
            Mail::to(session('user')->email)->send(new Purchase_Mail());
            session()->put('success', 'Uspešno ste poručili Vaše sveće, za više informacija proverite Vaš e-mail.');
            return response()->redirectToRoute('cart.index');
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error', 'Neuspešno poručivanje, kontaktirajte administratora.');
            return response()->redirectToRoute('cart.index');
        }
    }
}
