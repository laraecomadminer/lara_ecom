<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
public function index()
	{
		$products = Product::all();
		return view('Admin/ShoppingFile/cart_home', compact('products'));
	}
public function addToCart(Request $request)
  {
	  //dd($request->all());
		$productId=$request->productId;
        $productById= Product::where('id',$productId)->first();
	
	    Cart::add([
            'id'=>$productId,
            'name'=>$productById->productName,
            'price'=>$productById->productPrice,
            'pic'=>$productById->productPicture,
            'qty'=>$request->qty
        ]);
		return redirect('/cart-show');	
		
	  }
	  public function cartShow()
		{
			$cartProducts = Cart::Content();
		    return view('Admin/ShoppingFile/show_cart',compact('cartProducts'));
		}
		public function updateCart(Request $request)
		{
			Cart::update($request->rowId, $request->qty);
			
			return redirect('/cart-show')->with('msg', 'Cart Update Successfully');
		}
		public function deleteCart($rowId)
		{
			Cart::remove($rowId);
			return redirect('/cart-show')->with('Msg', 'Cart Product remove Successfully');
		}
  }

  
  
  
  
  
  