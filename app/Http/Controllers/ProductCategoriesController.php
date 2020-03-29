<?php

namespace App\Http\Controllers;

use App\Models\ProductCategories;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
   
    public function index()
    {
        $categories = ProductCategories::get();
        return view('productCategories.index', ['categories' => $categories]);
    }

   
    public function create()
    {
        return view('productCategories.create');
    }

    
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'type' => $request->type
        ];
        ProductCategories::create($data);
        return redirect()->route('categories.index')->withStatus(__('Product Category Added Successfuly!'));
    }

    
    public function show(ProductCategories $productCategories)
    {
        //
    }

   
    public function edit(ProductCategories $productCategories, $id)
    {
        $category = ProductCategories::find($id);
        return view('productCategories.edit', ['category' => $category]);
    }

    
    public function update(Request $request, ProductCategories $productCategories, $id)
    {
        $data = [
            'name' => $request->name,
            'type' => $request->type
        ];
        ProductCategories::where('id', $id)->update($data);
        return redirect()->route('categories.index')->withStatus(__('Product Category Updated Successfuly!'));
    }

    
    public function destroy(ProductCategories $productCategories, $id)
    {
        ProductCategories::where('id', $id)->delete();
        return redirect()->route('categories.index')->withStatus(__('Product Category Deleted Successfuly!'));
    }
}
