<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\DataObject\CourseDataObject;
use App\Http\Requests\Course\CreateCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Models\Category;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(5);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name')->get();

        return view('admin.courses.create', compact('categories'));
    }

    public function store(CreateCourseRequest $request)
    {

        $data = new CourseDataObject($request);
        $data = $data->storeDO($request);

        Course::create($data);

        return redirect()->route('admin.courses.index')->with('success', 'Data Created Successfully');
    }

    public function edit(Course $course)
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.courses.edit', compact('course', 'categories'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {

        $data = new CourseDataObject($request);
        $data = $data->updateDO($request, $course);

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'Data Updated Successfully');
    }

    public function destroy(course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Data Deleted Successfully');
    }

    // get all deleted courses
    public function deletedcourses()
    {
        $deletedcourses = Course::onlyTrashed()->latest()->paginate(5);

        return view('admin.courses.deleted_courses', compact('deletedcourses'));
    }

    // restore deleted course
    public function restoreDeletedcourses($id)
    {
        $deletedcourse = Course::onlyTrashed()->find($id);
        $deletedcourse->restore();

        return redirect()->route('admin.courses.index')->with('success', 'Data Restored Successfully');
    }

    // Permanently delete course
    public function permanentlyDeletedcourses($id)
    {
        $deletedcourse = Course::onlyTrashed()->find($id);
        $deletedcourse->forceDelete();

        return redirect()->route('admin.courses.index')->with('success', 'Data Deleted Permanently Successfully');
    }
}
