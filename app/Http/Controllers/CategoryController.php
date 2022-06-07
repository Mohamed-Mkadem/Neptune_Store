<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(15);
        return view('admin.categories.categories', ['categories' => $categories]);
    }


    public function show($id)
    {
        $category = Category::find($id);
        $subacategory = $category->subCategories()->paginate(15);
        // dd($category);
        return view('admin.categories.category', ['category' => $category, 'subCategory' => $subacategory]);
    }



    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => ['required', 'unique:categories'],
        ]);
        $category->update($request->all());
        return redirect()->back()->with('success', 'Category updated successfully');
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:categories'],
        ]);

        $category =  Category::create($request->all());

        return redirect()->back()->with('success', 'Category Added Successfully');
    }




    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories')->with('success', 'Category Deleted Successfully');
    }
}
