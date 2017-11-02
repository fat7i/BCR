<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index ()
    {
        $categories = Category::pluck('title', 'id');
        return view('category.index', ['categories' => $categories]);
    }

    public function show($id)
    {
        echo "id=>>". $id;

    }
}
