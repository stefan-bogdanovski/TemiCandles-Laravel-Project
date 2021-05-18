<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'opis', 'created_at', 'updated_at'];

    public function notes()
    {
        return $this->belongsToMany(Note::class, 'products_notes');
    }
    public function available_notes() {
        return $this->notes()->where('products_notes.deleted_at', null);
    }
    public function types()
    {
        return $this->belongsToMany(Type::class, 'products_types');
    }
    public function productsizes()
    {
        return $this->hasMany(Product_Size::class, 'product_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(Product_Images::class);
    }
    public function getProductsWithQueryStringFilters($request)
    {
        try {
            \DB::enableQueryLog();
            $query = Product::with('types', 'productsizes', 'available_notes')
                ->where('products.deleted_at', null);
            $query->join('product_images', 'products.id', '=', 'product_images.id');
            if($request->has('keyword'))
            {
                $query = $query
                    ->where('products.name', 'LIKE', '%'.$request->get('keyword').'%');
            }
            //dd($query->get());
            return $query;
        }
        catch (\Exception $ex)
        {
            Log::info($ex->getMessage());
        }


    }
}
