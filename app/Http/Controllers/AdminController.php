<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function admin_category() {
        $all_categories = category::all();
        return view('admin.category', compact('all_categories'));
    }

    public function add_category(Request $request) {
        $new_category = new Category();
        $new_category->category_name = $request->category;

        $new_category->save();
        return redirect()->back()->with('message', 'Category added successfully.');
    }

    public function delete_category($id) {
        $category_to_delete = category::find($id);
        $category_to_delete->delete();

        return redirect()->back()->with('message', "Category deleted successfully.");
    }

    public function view_products() {
        $all_categories = category::all();

        return view('admin.products', compact('all_categories'));
    }

    public function add_product(Request $request) {
        $new_product = new product;
        $new_product->title = $request->title;
        $new_product->description = $request->description;
        $new_product->price = $request->price;
        $new_product->quantity = $request->quantity;
        $new_product->discount_price = $request->discount_price;
        $new_product->category = $request->category;

        $image = $request->image;
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products', $image_name);
        $new_product->image = $image_name;

        $new_product->save();

        return redirect()->back()->with('message', "Product added successfully.");
    }

    public function show_products() {
        $products = product::all();

        return view('admin.show-products', compact('products'));
    }

    public function delete_product($id) {
        $to_be_deleted = product::find($id);
        $to_be_deleted->delete();

        return redirect()->back()->with('message', "Product deleted successfully");
    }
}
