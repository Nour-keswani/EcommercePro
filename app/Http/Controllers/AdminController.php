<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category() {
        $data = category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request) {
        $data = new category;
        $data->category_name=$request->category;
        $data->save();

        return redirect()
            ->back()
            ->with('message', 'Category Added Successfully');
    }

    public function delete_category($id) {

        $data = Category::find($id);
        $data->delete();
        // session()->flash('message', 'Category has been deleted successfully !');
        return redirect()
                ->back()
                ->with('message', 'Category Deleted Successfully');

    }



    public function view_product() {
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request) {

        $product = new product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->category=$request->category;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
        $product->save();

        return redirect()
                ->back()
                ->with('meesage', 'Product Added Successfully');
    }


    public function show_product() {
        $product = product::all();
        return view('admin.show_product', compact('product'));
    }
    public function delete_product($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('meesage', 'Product Is Deleted Successfully');
    }
    public function edit_product($id) {
        $product = Product::find($id);
        $category = category::all();
        return view('admin.edit_product', compact('product', 'category'));

    }
    public function edit_product_confirm(Request $request, $id) {
        $product = Product::find($id);

        $product->title=$request->title;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->category=$request->category;

        $image=$request->image;
        if($image) {

            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;
        }
        $product->save();

        return redirect()
                ->back()
                ->with('meesage', 'Product Edited Successfully');
    }



    public function order() {
        $orders = Order::all();
        return view('admin.order', compact('orders'));
    }

    public function delete_order($id) {
        $order = Order::find($id);
        $order->delete();

        return redirect()
                ->back()
                ->with('message', 'Order Has Been Deleted Successfully');
    }

    public function delivered($id) {
        $order = Order::find($id);
        $order->delivery_status="Delivered";
        $order->save();

        return redirect()
                ->back()
                ->with('message', 'Order Has Been Delivered');
    }
}
