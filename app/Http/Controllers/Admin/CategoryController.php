<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        $data['name'] = $request->name;
        $data['active'] = $request->active ? 1 : 0;

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Data Created Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $data['name'] = $request->name;
        $data['active'] = $request->active ? 1 : 0;

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Data Updated Successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Data Deleted Successfully');
    }

    // get all deleted categories
    public function deletedCategories()
    {
        $deletedCategories = Category::onlyTrashed()->latest()->paginate(5);

        return view('admin.categories.deleted_categories', compact('deletedCategories'));
    }

    // restore deleted category
    public function restoreDeletedCategories($id)
    {
        $deletedCategory = Category::onlyTrashed()->find($id);
        $deletedCategory->restore();

        return redirect()->route('admin.categories.index')->with('success', 'Data Restored Successfully');
    }

    // Permanently delete category
    public function permanentlyDeletedCategories($id)
    {
        $deletedCategory = Category::onlyTrashed()->find($id);
        $deletedCategory->forceDelete();

        return redirect()->route('admin.categories.index')->with('success', 'Data Deleted Permanently Successfully');
    }
}
