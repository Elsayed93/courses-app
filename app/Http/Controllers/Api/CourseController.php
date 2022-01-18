<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;

class CourseController extends Controller
{
    public function getAllCourses()
    {
        $allCourses = Course::with('category:id,name')->latest()->paginate(10);

        $data =  CourseResource::collection($allCourses);

        return response()->json(['data' =>  $data ], 200);
    }
}
