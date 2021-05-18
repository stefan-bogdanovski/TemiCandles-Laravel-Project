<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ProductController extends MainController
{
    public const ProductsPerPage = 3;
    public function __construct(Request $request)
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        try{
            $productModel = new Product();
            $query = $productModel->getProductsWithQueryStringFilters($request);
            $query = $query->paginate(self::ProductsPerPage)->withQueryString();
            //dd($query);
            $this->data['sizes'] = Size::all()->where("deleted_at", null);
            $this->data['notes'] = Note::all()->where("deleted_at", null);
            $this->data['products'] = $query;
            if($request->ajax())
            {
                return response()->json($query);
            }
            return view('pages.products', $this->data);
        }
        catch (\Exception $ex)
        {
            //dd($ex->getMessage());
            Log::info($ex->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getPrice(Request $request)
    {
        $product = DB::table('products')
            ->join('products_sizes', 'products.id', '=', 'products_sizes.product_id')
            ->join('sizes', 'products_sizes.size_id', '=', 'sizes.id')
            ->where('products.id','=' , $request->get('productid'))
            ->where('sizes.id', '=', $request->get('value'))->select('products_sizes.price')->first();
        return response()->json($product);

    }
}
