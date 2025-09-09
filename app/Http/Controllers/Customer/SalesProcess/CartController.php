<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Models\Market\Guarantee;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Market\CartItem;
use App\Http\Controllers\Controller;
use App\Models\Market\Delivery;
use App\Models\Market\ProductColor;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        if (Auth::check()) {
            $product = Product::all();
            $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
            $deliveries = Delivery::all();
            if ($cartItems->count() > 0) {
                $relatedProducts = Product::all();
                return view('customer.sales-process.cart', compact('cartItems', 'relatedProducts','deliveries','product'));
            } else {
                return redirect()->back()->with('alert-section-warning', 'سبد خرید شما خالی است');
            }
        } else {
            return redirect()->route('auth.customer.welcome-register');
        }
  
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'number' => 'required|array',
            'number.*' => 'required|numeric|min:1|max:5',
        ]);

        $inputs = $request->all();
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();

        foreach ($cartItems as $cartItem) {
            if (isset($inputs['number'][$cartItem->id])) {
                $cartItem->update(['number' => $inputs['number'][$cartItem->id]]);
            }
        }

        return redirect()->route('customer.sales-process.address-and-delivery');
    }

    public function addToCart(Product $product, Request $request)
    {
        
        if (Auth::check()) {

            $cartItems = CartItem::where('product_id', $product->id)
                ->where('user_id', Auth::user()->id)
                ->get();
                
                if (!$request->has('color')) {
                    $request->merge(['color' => null]);
                }
                
                if (!$request->has('guarantee')) {
                    $request->merge(['guarantee' => null]);
                }
                
            foreach ($cartItems as $cartItem) {
                if ($cartItem->color_id == $request->color && $cartItem->guarantee_id == $request->guarantee) {
                    if ($cartItem->number != $request->number) {
                        $cartItem->update(['number' => $request->number]);
                    }
                    return back();
                }
            }
            
            $inputs = [
                'color_id' => ProductColor::where("product_id",'=',$product->id)->first()->id,
                'guarantee_id' => Guarantee::where("product_id",'=',$product->id)->first()->id,
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'number' => 1, // Ensure the 'number' field is set
            ];
            
            CartItem::create($inputs);

            return back()->with('alert-section-success', 'محصول مورد نظر با موفقیت به سبد خرید اضافه شد');
        } else {
            return redirect()->route('auth.customer.welcome-register');
        }
    }

    public function removeFromCart(CartItem $cartItem)
    {
        if ($cartItem->user_id === Auth::user()->id) {
            $cartItem->delete();
        }
        return back();
    }





}
