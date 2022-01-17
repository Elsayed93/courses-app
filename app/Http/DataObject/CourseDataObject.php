<?php

namespace App\Http\DataObject;

use Intervention\Image\Facades\Image;

class CourseDataObject
{


    public function storeDO($request)
    {
        // dd('dto', $request->all());
        // dd($request->has('image'));
        $data['name'] = $request->name;
        $data['category_id'] = $request->category_id;
        $data['description'] = $request->description;
        $data['rating'] = $request->rating;
        $data['views'] = $request->views;
        $data['hours'] = $request->hours;
        $data['levels'] = $request->levels;
        $data['active'] = $request->active ? 1 : 0;

        // dd($request->has('image'));
// dd( $request->image->hashName());
        if ($request->has('image')) {
            $img = Image::make($request->image)->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/courses_images/') . $request->image->hashName());
        }

        if ($request->image != null) {
            $data['image'] = $request->image->hashName();
        } else {
            $data['image'] = 'default.jpg';
        }

        return $data;
    }
}
