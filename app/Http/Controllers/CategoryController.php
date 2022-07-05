<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('subCategories')->paginate(15);
        return view('admin.categories.categories', ['categories' => $categories]);
    }


    public function show($id)
    {
        $category = Category::findOrFail($id);
        // dd($category);
        $subacategory = $category->subCategories()->withCount('products')->paginate(15);
        // dd($category);
        return view('admin.categories.category', ['category' => $category, 'subCategory' => $subacategory]);
    }



    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => ['required', "unique:categories,name,$id"],
            'slogan' => ['required', 'string']
        ]);
        $category->update($request->all());
        return redirect()->back()->with('success', 'Category updated successfully');
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:categories'],
            'slogan' => ['required', 'string', 'max:60']
        ]);
        $request->merge([
            'slug' =>  Str::slug($request->name)
        ]);
        $category =  Category::create($request->all());

        return redirect()->back()->with('success', 'Category Added Successfully');
    }




    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        // dd($category->subCategories->count());
        if($category->subCategories->count() > 0){
            return redirect()->back()->with('newErrors', 'Cannot Delete A Category that have sub Categories');
        }else{
            Category::destroy($id);
            return redirect()->route('categories')->with('success', 'Category Deleted Successfully');
        }
    }

    public function home()
    {
        $categories = Category::limit(3)->get();
        $bestProduct = Product::orderBy('ordered', 'DESC')->limit(4)->get();
        $newProduct = Product::limit(4)->latest()->get();

        return view('customer.home', ['categories' => $categories, 'newProducts' => $newProduct, 'bestProducts' => $bestProduct]);
    }
}
