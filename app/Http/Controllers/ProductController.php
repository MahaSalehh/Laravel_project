<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function view_product()
    {
        $category = Category::all();
        return view('admin.product', compact('category'));
    }

    // add products
    public function add_product(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ], [
            'title.required' => 'you have to write a title',
            'description.required' => 'Please provide a description.',
            'price.required' => 'Product price is required.',
            'quantity.required' => 'Quantity cannot be left empty.',
            'category.required' => 'Please select a category.',
            'image.required' => 'Product image is required.',
        ]);

        $image = $request->image;
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $image_name);

        DB::table('products')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'discount_price' => $request->discount_price,
            'category' => $request->category,
            'image' => $image_name,
            'created_at' => now(),  // optional, if you want to track creation time
            'updated_at' => now()   // optional, if you want to track update time
        ]);

        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    // view product
    public function show_product()
    {
        $product = Product::all();
        return view('admin.show_product', compact('product'));
    }
    //delete product
    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'product Deleted successfully');
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.update_product', compact('product', 'category'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = request()->title;
        $product->description = request()->description;
        $product->price = request()->price;
        $product->quantity = request()->quantity;
        $product->discount_price = request()->discount_price;
        $product->category = request()->category;

        if (request()->hasFile('image')) {
            $image = $request->image;
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $image_name);
            $product->image = $image_name;
        }

        $product->save();
        return redirect()->back()->with('message', 'Product updated successfully!');
    }
}
