<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    function __construct()
     {
          $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
          $this->middleware('permission:category-create', ['only' => ['create','store']]);
          $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = Category::orderBy('created_at', 'asc')->get();
        return view('categories.index', compact('categories'))->with('i', (request()->input('page', 1)-1)* 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'category_name' => 'required|unique:categories',
            'description' => 'required',
        ]);
    
        $input = $request->all();
        Category::create($input);
    
        return redirect()->route('categories.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $id = $category->id;
        $this->validate($request, [
            'category_name' => 'required|unique:categories,category_name,'.$id,
            'description' => 'required',
        ]);
    
        $input = $request->all();
    
        $category->update($input);

        return redirect()->route('categories.index')
                        ->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
                        ->with('deleted','category deleted successfully');
    }
}
