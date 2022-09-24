<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use Session;
use Stripe;

class HomeController extends Controller
{
    public function index(){
        $product = Product::paginate(15);
        return view('home.userpage',compact('product'));
    }

    public function redirect(){
        $usertype=Auth::user()->usertype;

        if($usertype=='1'){
            return view('admin.home');
        }else{
            $product = Product::paginate(3);
        return view('home.userpage',compact('product'));
        }
    }

    public function product_details($id) {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $reqeust, $id) {
        if(Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new cart;
            $cart->user_id = $user->id;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->address = $user->address;

            $cart->product_id = $product->id;
            $cart->product_title = $product->title;

            if($product->discount_price!=null) {

                $cart->price = $product->discount_price * $reqeust->quant;
            } else {
                $cart->price = $product->price * $reqeust->quant;
            }

            $cart->quntity = $reqeust->quant; // The first part came form db and the secon after = from the form input name
            $cart->image = $product->image;

            $cart->save();
            return redirect()->back();

        } else {
            return redirect('login');
        }
    }

    public function show_cart() {
        if(Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id','=',$id)->get();
            return view('home.showcart', compact('cart'));
        } else {
            return redirect('login');
        }
    }

    public function remove_cart($id) {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()
                ->back()
                ->with('messages', 'Product has ben removed from cart');
    }

    public function cash_order($totalprice) {
        if($totalprice==0) {
            return redirect()->back()->with('messages', 'Please add some product');
        } else {

        $user = Auth::user();
        $userid = $user->id;
        $data = Cart::where('user_id','=',$userid)->get();

        foreach($data as $data) {

            $order = new Order;
            // $order come from table order and $data come from cart table
            $order->name = $data->name;
            $order->email = $data->email;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->quantity = $data->quntity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->name = $data->name;

            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        return redirect()
                ->back()
                ->with('messages', 'We Have Received Your Order. Will Conntact With You Soon...');
        }
    }

    public function stripe($totalprice) {
        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment."
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
