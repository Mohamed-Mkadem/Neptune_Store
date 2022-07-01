<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('subCategories')->paginate();
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
            'name' => ['required', 'string'],
            'cost_price' => ['required', 'numeric', 'between:1.0, 999.99'],
            'price' => ['required', 'numeric', 'between:1.0, 999.99'],
            'quantity' => ['required', 'integer', 'min:1'],
            'description' => ['required', 'string'],
            'policy' => ['required', 'string'],
            'image' => ['required', 'string'], // Add the url rule on the production
            'sub_category_id' => ['required']
        ]);
        $request->merge([
            'slug' =>  Str::slug($request->name) .'_' .  Str::uuid()
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
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $subCategories = $product->subCategories()->paginate();
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
        return view('admin.products.editProduct', ['product' => $product, 'categories' => $categories]);
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
        // dd($product->ordered);
        if($product->ordered > 0){
            $product->destroy($id);
            return redirect(route('products'))->with('success', 'Product Deleted Successfully');
        }else{
            $product->forceDelete();
            return redirect(route('products'))->with('success', 'Product Deleted Successfully');
        }



        

    }


    // The logic of the customer 
    public function collection()
    {
        $categories = Category::with('subCategories')->get();
        // dd($categories);
        $products = Product::paginate();
        return view('customer.collection', ['products' => $products, 'categories' => $categories]);
    }

    // Product Page Function
    public function showProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('customer.product', ['product' => $product]);
    }

    public function showCategoryProducts($slug)
    {
        // Getting the target category
        $category  = Category::where('slug', $slug)->first();
        // dd($category->id);
        // Getting the subCategories that belongs to the target category
        $subCategories = SubCategory::where("parent_id", $category->id)->get();
        // dd($subCategories);
        // Pushing the "id"s of the subCategories to an array
        $ids = [];
        foreach ($subCategories as $subCat) {
            $ids[] = $subCat->id;
        }

        //  Getting the Products that belongs to the subCategories from the pivot table 

        $products_ids = DB::table('product_sub_category')
            ->select('product_id')
            ->whereIn('sub_category_id', $ids)->get();
        // Extracting the "id"s from the product_ids collection
        $products_ids_final = [];

        foreach ($products_ids as $product) {
            $products_ids_final[] = $product->product_id;
        }

        // Removing the duplicate ids
        $products_ids_final = array_unique($products_ids_final);


        // And Finally getting the products from the product model
        $products = Product::whereIn('id', $products_ids_final)->paginate();

        // $products = Product::whereIn('id', $products_ids)->get();
        return view('customer.category', ['category' => $category, 'products' => $products]);
    }


    // Filter Product

    public function filter(Request $request)
    {
        //    $category =  Category::findOrFail($request->input('category_id'));
        if ($request->has('category_id')) {
            // Getting the target category
            $category =  Category::findOrFail($request->input('category_id'));
            // Getting The subCategories as collection then i will extract the ids
            if ($request->input('subCategories')) {
                $subCategories = SubCategory::whereIn('id', $request->input('subCategories'))->get();
            } else {
                $subCategories = SubCategory::where('parent_id', $category->id)->get();
            }
            
            // Extracting the ids andputting them in array
            $sub_categories_ids = [];
            foreach ($subCategories as $subCat) {
                $sub_categories_ids[] = $subCat->id;
            }
            // Getting the Product IDS That belongs to the selected sub Categories

            $products_ids = DB::table('product_sub_category')->select('product_id')->whereIn('sub_category_id', $sub_categories_ids)->get();
            // Extracting the ids and putting them into array
            $products_ids_final_list = [];
            foreach ($products_ids as $product) {
                $products_ids_final_list[] = $product->product_id;
            }
            // Removing the duplicate ids
            $products_ids = array_unique($products_ids_final_list);

            // Getting the min and the max values
            $min = $request->input('min') ?? 0;
            $max = $request->input('max') ?? 100000;


            $products = Product::whereIn('id', $products_ids)
                ->whereBetween('price', [$min, $max])
                ->paginate();
            // dd($products);
            return view('customer.filter_results', ['products' => $products]);
        } else {
            //  In case that the user didn't specify any Category
            $min = $request->input('min') ?? 0;
            $max = $request->input('max') ?? 100000;


            $products = Product::whereBetween('price', [$min, $max])->paginate();
            // dd($products);
            return view('customer.filter_results', ['products' => $products]);
        }
    }

    // Search using the form
    public function formSearch(Request $request)
    {

        $target = $request->input('target');
        $searched_products = Product::where('name', 'like', '%' . $target . '%')->paginate();


        return view('customer.search_results', ['searched_products' => $searched_products]);
    }
}
