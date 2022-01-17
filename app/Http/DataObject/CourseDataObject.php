<?php

namespace App\Http\DataObject;


class CourseDataObject
{


    public function storeDO($request)
    {
        $data['name'] = $request->name;
        $data['category_id'] = $request->category_id;
        $data['description'] = $request->description;
        $data['rating'] = $request->rating;
        $data['views'] = $request->views;
        $data['hours'] = $request->hours;
        $data['levels'] = $request->levels;
        $data['active'] = $request->active ? 1 : 0;

        return $data;
    }
}
