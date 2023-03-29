<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
   }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::join('categories', 'categories.id', '=', 'products.category_id')
        ->get(['products.*', 'categories.id', 'categories.category_name', 'products.id' ]);
        return view('products.index', compact('products'))->with('i', (request()->input('page', 1)-1)* 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderby('category_name', 'asc')->get();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'category_id' => 'required',
            'product_name' => 'required|unique:products',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif',
        ]);
    
        $input = $request->all();

        if($image = $request->file('image')){
            $destinationPath = 'image/products';
            $profileImage = $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Product::create($input);
    
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        $name = $product->category_id;
        $categories = Category::where('id', '!='  , $name)->get();
      
        $products_category = Product::join('categories', 'categories.id', '=', 'products.category_id')
        ->get(['products.*', 'categories.id', 'categories.category_name', 'products.id' ]);

        return view('products.edit',compact('product','categories','products_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $id = $product->id;
        $this->validate($request, [
            'product_name' => 'required|unique:categories,category_name,'.$id,
            'category_id' => 'required',
            'description' => 'required',
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif',
        ]);
    
        $input = $request->all();
        $previous = $product->image;

        if ($image = $request->file('image')) {
            File::delete('image/products/' . $previous . '');
            $destinationPath = 'image/products';
            $profileImage = $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
         
        }else{
            unset($input['image']);
        }
        $product->update($input);

        return redirect()->route('products.index')
                        ->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $image = $product->image;
        File::delete('image/products/' . $image . '');
    
        return redirect()->route('products.index')
                        ->with('deleted','category deleted successfully');
    }
}
