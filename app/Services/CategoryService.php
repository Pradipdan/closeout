<?php
namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;

class CategoryService

{
    protected CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function create($categoryData)
    {
        $category = $this->categoryRepository->create($categoryData);
        return $category;
    }

    public function getAll(){
        $categories = $this->categoryRepository->getAll();
        return $categories;
    }

    public function update($categoryData ,$id)
    {
        $category = $this->categoryRepository->update($categoryData ,$id);
        return $category;
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->destroy($id);
        return $category;
    }

}
