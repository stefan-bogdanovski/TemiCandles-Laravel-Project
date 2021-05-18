<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\AddProductSizeRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Note;
use App\Models\Product;
use App\Models\Product_Images;
use App\Models\Product_Note;
use App\Models\Product_Size;
use App\Models\Product_Type;
use App\Models\Size;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminProductController extends MainAdminController
{
    public function __construct()
    {
        $this->data['entity'] = "products";
        $this->data['attributes'] = ['Id', 'Ime'];
        $this->data['title'] = "Proizvodi";

    }
    public function index()
    {
        $this->data['data'] = Product::all()->where("deleted_at", null);
        $this->data['edit'] = true;
        return view('admin.genericView', $this->data);
    }

    public function create()
    {
        $this->data['sizes'] = Size::all()->where("deleted_at", null);
        $this->data['notes'] = Note::all()->where("deleted_at", null);
        $this->data['types'] = Type::all()->where("deleted_at", null);
        return view('admin.createforms.product_add', $this->data);
    }

    public function store(AddProductRequest $request)
    {
        try
        {
            $image = $request->file("slika");

            $filename = uniqid() . "_" . time() . "." . $image->extension();

            $image->storeAs("public/images", $filename);

            $product = $request->all();

            $product["slika"] = $filename;

            $productToStore = Product::create([
                    "name" => $product["name"],
                    "opis" => $product["opis"],
                    "created_at" => time(),
                    "updated_at" => time()
                ]);
            Product_Size::create([
                    "product_id" => $productToStore->id,
                    "size_id" => $product["size"],
                    "price" => $product["price"],
                    "created_at" => time(),
                    "updated_at" => time()
                ]);
            Product_Type::create([
               "product_id" => $productToStore->id,
               "type_id" => $product["type"],
               "created_at" => time(),
               "updated_at" => time()
            ]);
            foreach($product["notes"] as $note)
            {
                Product_Note::create([
                    "product_id" => $productToStore->id,
                    "note_id" => $note,
                    "created_at" => time(),
                    "updated_at" => time()
                ]);
            }
            Product_Images::create([
                "src" => $product["slika"],
                "product_id" => $productToStore->id,
                "created_at" => time(),
                "updated_at" => time()
            ]);
            session()->put('success',"Uspešno dodavanje proizvoda!");
            return redirect()->back();
        }
        catch(\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('error', "Neuspešno dodavanje proizvoda");
            return redirect()->back();
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $this->data["product"] = Product::with('productsizes', 'types', 'notes', 'images')
            ->where("deleted_at", null)
            ->where("id" , $id)->first();
        $this->data["types"] = Type::all()->where("deleted_at", null);
        $this->data['notes'] = Note::all()->where("deleted_at", null);
        $this->data['sizes'] = Size::all()->where("deleted_at", null);
        $this->data['image'] = Product_Images::where("product_id", $id)->where("deleted_at", null)->get();
        return view("admin.editforms.product_edit", $this->data);
    }
    public function update(EditProductRequest $request, $id)
    {
        $name = $request->input("name");
        $opis = $request->input("opis");
        $sizeID = $request->input("size");
        $notes = $request->input("notes");
        $type = $request->input("type");
        $price = $request->input("price");
        try{
            $product = Product::find($id);
            $product->name = $name;
            $product->opis = $opis;
            $product->updated_at = date('Y-m-d H:i:s');
            $product->save();
            Product_Size::where("size_id", $sizeID)
                ->where("product_id", $id)
                ->update([
                    "price" => $price,
                    "updated_at" => date('Y-m-d H:i:s')
                ]);
            Product_Type::where("product_id", $id)
                ->update([
                    "type_id" => $type,
                    "updated_at" => date('Y-m-d H:i:s')
                ]);
            Product_Note::where("product_id", $id)->update(["deleted_at" => date('Y-m-d H:i:s')]);
            foreach($notes as $note)
            {
                Product_Note::create([
                    "product_id" => $id,
                    "note_id" => $note,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ]);
            }
            if(!empty($request->file("slika")))
            {
                Product_Images::where("product_id", $id)->update(["deleted_at" => date('Y-m-d H:i:s')]);

                $image = $request->file("slika");

                $filename = uniqid() . "_" . time() . "." . $image->extension();

                $image->storeAs("public/images", $filename);

                Product_Images::create([
                    "src" => $filename,
                    "product_id" => $id,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ]);
            }
            session()->put('success',"Uspešna izmena proizvoda!");
            return redirect()->back();
        }
        catch (\Exception $ex)
        {
            session()->put('error',"Neuspešna izmena proizvoda!");
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        try{
            Product_Images::where("product_id", $id)->update(["deleted_at" => date('Y-m-d H:i:s')]);
            Product_Type::where("product_id", $id)->update(["deleted_at" => date('Y-m-d H:i:s')]);
            Product_Size::where("product_id", $id)->update(["deleted_at" => date('Y-m-d H:i:s')]);
            Product_Note::where("product_id", $id)->update(["deleted_at" => date('Y-m-d H:i:s')]);
            Product::where("id", $id)->update(["deleted_at" => date('Y-m-d H:i:s')]);

            session()->put('success',"Uspešno brisanje proizvoda!");
            return redirect()->back();
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('success',"Neuspešno brisanje proizvoda!");
            return redirect()->back();
        }
    }
    public function showDeleted()
    {
        try{
            $this->data['deleted'] = Product::where('deleted_at', '<>', null)->get();
            array_push($this->data['attributes'], 'Datum brisanja');
            array_push($this->data['attributes'], 'Povrati');
            return view('admin.restoreForms.restore', $this->data);
        }
        catch(\Exception $ex)
        {
            Log::info($ex->getMessage());
        }

    }
    public function restoreDeleted($id)
    {
        try {
            Product_Images::where("product_id", $id)->update(["deleted_at" => null]);
            Product_Type::where("product_id", $id)->update(["deleted_at" => null]);
            Product_Size::where("product_id", $id)->update(["deleted_at" => null]);
            Product_Note::where("product_id", $id)->update(["deleted_at" => null]);
            Product::where("id", $id)->update(["deleted_at" => null]);

            Product_Images::where("product_id", $id)->update(["updated_at" => date('Y-m-d H:i:s')]);
            Product_Type::where("product_id", $id)->update(["updated_at" => date('Y-m-d H:i:s')]);
            Product_Size::where("product_id", $id)->update(["updated_at" => date('Y-m-d H:i:s')]);
            Product_Note::where("product_id", $id)->update(["updated_at" => date('Y-m-d H:i:s')]);
            Product::where("id", $id)->update(["updated_at" => date('Y-m-d H:i:s')]);
            session()->put('success',"Uspešno vraćanje proizvoda!");
            return redirect()->back();
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            session()->put('success',"Neuspešno vraćanje proizvoda!");
            return redirect()->back();
        }
    }
    public function addSizeView()
    {
        try {
            $this->data['products'] = Product::where('deleted_at', null)->get();
            $this->data['sizes'] = Size::where('deleted_at', null)->get();
            return view('admin.productSize.addProductSize', $this->data);
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }
    public function addSize(AddProductSizeRequest $request)
    {
        try {
            if($this->SizeExist($request->input('product'), $request->input('size')))
            {
                session()->put('error',"Neuspešno dodavanje veličine proizvodu! Veličina za taj proizvod je već dodata.");
                return redirect()->back();
            }
            Product_Size::create([
                'product_id' => $request->input('product'),
                'size_id' => $request->input('size'),
                'price' => $request->input('price')
            ]);
            session()->put('success',"Uspešno dodavanje veličine proizvodu!");
            return redirect()->back();
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            return redirect()->back();
        }

    }
    public function deleteProductSizeView()
    {
        try {
            $this->data['products'] = Product::where('deleted_at', null)->get();
            $this->data['sizes'] = Size::where('deleted_at', null)->get();
            return view('admin.productSize.deleteProductSize', $this->data);
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }
    public function deleteProductSize(Request $request)
    {
        try {
            if(!$this->SizeExist($request->input('product'), $request->input('size')))
            {
                session()->put('error',"Neuspešno brisanje veličine proizvoda!
                 Veličina za taj proizvod ne postoji.");
                return redirect()->back();
            }
            Product_Size::where('product_id', $request->input('product'))
                ->where('size_id', $request->input('size'))->delete();
            session()->put('success',"Uspešno brisanje veličine proizvoda!");
            return redirect()->back();
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
            return redirect()->back();
        }
    }
    public function SizeExist($product_id, $size_id)
    {
        return Product_Size::where('product_id', $product_id)
            ->where('size_id', $size_id)->first() ? true : false;
    }
}
