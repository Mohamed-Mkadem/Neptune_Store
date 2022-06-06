<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', Rule::unique('sub_categories')->where(function ($query) use ($request) {
                return $query->where('parent_id', $request->parent_id);
            })],
            'parent_id' => ['required']
        ]);
        $subCategory = SubCategory::create($request->all());
        return back()->with('success', 'The Sub-Category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory, $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.subCategory', ['subCategory' => $subCategory, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory, $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $request->validate([
            'name' => ['required','string', Rule::unique('sub_categories')->where(function ($query) use ($request) {
                return $query->where('parent_id', $request->parent_id);
            })],
            'parent_id' => ['required', 'integer']
        ]);

        $subCategory->update($request->all());

        return back()->with('success', 'SubCategory Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory, $id)
    {
        // Find the parent id because i need it to back to category page after deletion
        $subCategory = SubCategory::findOrFail($id);
        $parent_id = $subCategory->parent_id;
        $subCategory->destroy($id);
        return redirect(route("showCategory", $parent_id))->with('success', 'Sub-Category Deleted Successfully');
    }
}
