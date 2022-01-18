<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $courses = Course::where('active', 1)->with('category:id,name')->latest()->paginate(12);
        $categories = Category::where('active', 1)->with('courses:id,name')->latest()->paginate(12);

        return view('welcome', compact('courses', 'categories'));
    }
}
