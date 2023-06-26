<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sku' => 'nullable',
            'barcode' => 'nullable',
            'capacity' => 'nullable',
            'unit' => 'nullable',
            'package_count' => 'nullable',
            'available_qty' => 'nullable|integer',
            'featured' => 'nullable|boolean',
            'deliverable' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'plus_option' => 'nullable|boolean',
            'digital' => 'nullable|boolean',
            'vendor_id' => 'nullable|exists:vendors,id',
            'in_order' => 'nullable|integer',
        ]);
    
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->barcode = $request->barcode;
        $product->capacity = $request->capacity;
        $product->unit = $request->unit;
        $product->package_count = $request->package_count;
        $product->available_qty = $request->available_qty;
        $product->featured = $request->featured;
        $product->deliverable = $request->deliverable;
        $product->is_active = $request->is_active;
        $product->plus_option = $request->plus_option;
        $product->digital = $request->digital;
        $product->vendor_id = $request->vendor_id;
        $product->in_order = $request->in_order;
    
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos');
            $product->photo = $photoPath;
        }
    
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }
    

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos');
            $product->photo = $photoPath;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
