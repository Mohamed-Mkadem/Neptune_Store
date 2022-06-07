<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('subCategories')->paginate(15);
        // dd($products);
        return view('admin.products.products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('subCategories')->get();
        // dd($categories);
        return view('admin.products.newProduct', [
            'categories' => $categories,
        ]);
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
            'name' => ['required', 'string', 'between:5,100'],
            'cost_price' => ['required', 'numeric', 'between:1.0, 999.99'],
            'price' => ['required', 'numeric', 'between:1.0, 999.99'],
            'quantity' => ['required', 'integer', 'min:1'],
            'description' => ['required', 'string'],
            'policy' => ['required', 'string'],
            'image' => ['required', 'string'],
            'sub_category_id' => ['required']
        ]);
        $product = Product::create($request->all());
        $product->subCategories()->attach($request->sub_category_id);


        return redirect(route('addProduct'))->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        // dd($product);
        $subCategories = $product->subCategories()->paginate();
        // dd($subCategories);
        return view('admin.products.product', ['product' => $product, 'subCategories' => $subCategories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $product = Product::findOrFail($id);
        // $subCategories = $product->subCategories()->paginate();
        $categories = Category::with('subCategories')->get();
        // dd($product);
        return view('admin.products.editProduct', ['product' => $product,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'between:5,100'],
            'cost_price' => ['required', 'numeric', 'between:1.0, 999.99'],
            'price' => ['required', 'numeric', 'between:1.0, 999.99'],
            'quantity' => ['required', 'integer', 'min:1'],
            'description' => ['required', 'string'],
            'policy' => ['required', 'string'],
            'image' => ['required', 'string'],
            'sub_category_id' => ['required']
        ]);

        $product = Product::findOrFail($id);

        $product->update($request->all());
        $product->subCategories()->sync($request->sub_category_id);

        return redirect()->back()->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->destroy($id);
        return redirect(route('products'))->with('success', 'Product Deleted Successfully');
    }
}
