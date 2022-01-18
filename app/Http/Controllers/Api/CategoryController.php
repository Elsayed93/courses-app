<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function getAllCategories()
    {
        $allCategories = Category::latest()->paginate(10);
        $data =  CategoryResource::collection($allCategories);

        return response()->json(['data' =>  $data ], 200);
    }
}
