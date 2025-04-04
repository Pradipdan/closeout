<?php
namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;

class ProductService

{
    protected ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function create($productData)
    {
        $product = $this->productRepository->create($productData);
        return $product;
    }

    public function getAll(){
        $categories = $this->productRepository->getAll();
        return $categories;
    }

    public function update($productData ,$id)
    {
        $product = $this->productRepository->update($productData ,$id);
        return $product;
    }

    public function destroy($id)
    {
        $product = $this->productRepository->destroy($id);
        return $product;
    }

}
