<?php

namespace App\Http\DataObject;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CourseDataObject
{

    public function __construct($request)
    {
        $this->data['name'] = $request->name;
        $this->data['category_id'] = $request->category_id;
        $this->data['description'] = $request->description;
        $this->data['rating'] = $request->rating;
        $this->data['views'] = $request->views;
        $this->data['hours'] = $request->hours;
        $this->data['levels'] = $request->levels;
        $this->data['active'] = $request->active ? 1 : 0;
    }


    public function storeDO($request)
    {
        // $data['name'] = $request->name;
        // $data['category_id'] = $request->category_id;
        // $data['description'] = $request->description;
        // $data['rating'] = $request->rating;
        // $data['views'] = $request->views;
        // $data['hours'] = $request->hours;
        // $data['levels'] = $request->levels;
        // $data['active'] = $request->active ? 1 : 0;

        if ($request->has('image')) {
            $img = Image::make($request->image)->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/courses_images/') . $request->image->hashName());
        }

        if ($request->image != null) {
            $data['image'] = $request->image->hashName();
        } else {
            $this->data['image'] = 'default.jpg';
        }

        return  $this->data;
    }

    public function updateDO($request, $course)
    {


        if ($request->has('image')) {
            if ($course->image != 'default.jpg') {
                Storage::disk('public_uploads')->delete('courses_images/' . $course->image);
            }

            $img = Image::make($request->image)->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/courses_images/') . $request->image->hashName());

            $this->data['image'] = $request->image->hashName();
        }

        return  $this->data;
    }
}
