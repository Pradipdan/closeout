<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\User;

class CategoryRepository
{

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function getAll()
    {
        return Category::query();
    }

    public function update($categoryData, $id)
    {
        $category = Category::find($id);
        $category->update($categoryData);
        return $category;
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return $category;

    }
}
