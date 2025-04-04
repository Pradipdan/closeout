<?php
namespace App\Repositories;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class ProductRepository
{

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function getAll()
    {
        return Product::orderBy('created_at', 'desc')->get();
    }

    public function update($productData, $id)
    {
        $product = Product::find($id);
        $product->update($productData);
        return $product;
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return $product;

    }
}
