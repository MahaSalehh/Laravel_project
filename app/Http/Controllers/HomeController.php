<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(5);
        return view('home.index', compact('product'));
    }
    public function redirect()
    {
        $usertype = Auth::User()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            // return view('home.userpage');
            $product = Product::paginate(5);
            return view('home.userpage', compact('product'));
        }
    }


    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        //check if the user login before  add cart or not
        if (Auth::id()) {
            // return redirect()->back();
            $user = Auth::user(); //get user data auth

            $product = Product::find($id); //get product data to add to cart

            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;
            if ($product->discount_price > 0) {
                $cart->price = ($product->price - ($product->price* $product->discount_price)) * $request->quantity;
            } else {
                $cart->price = $product->price * $request->quantity;
            }

            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back()->with('success', 'Item added to cart successfully!');
        } else {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('home.shopping_cart', compact('cart'));
        } else {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('message', 'product Deleted successfully');
    }


    public function cash_order()
    {
        if (Auth::id()) {
            $userid = Auth::user()->id;
            $data = Cart::where('user_id', '=', $userid)->get();

            foreach ($data as $cartItem) {
                $order = new Order;
                $order->name = $cartItem->name;
                $order->email = $cartItem->email;
                $order->phone = $cartItem->phone;
                $order->address = $cartItem->address;
                $order->user_id = $cartItem->user_id;
                $order->product_title = $cartItem->product_title;
                $order->quantity = $cartItem->quantity;
                $order->price = $cartItem->price;
                $order->image = $cartItem->image;
                $order->product_id = $cartItem->product_id;
                $order->payment_status = 'paid';
                $order->delivery_status = 'pending';
                $order->save();
                //
                $cart_id = $cartItem->id;
                $cart = Cart::find($cart_id);
                $cart->delete();
            }

            return redirect()->route('home.index')->with('message', 'we have recieved your order .We will connect you soon...');
        } else {
            return redirect('login');
        }
    }

    public function stripe($totalprice)
    {
        return view('home.stripe', compact('totalprice'));
    }
}
