<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;

class ProductController extends Controller
{
    //
	public function addProduct()
	{
		$categories = Category::where('publicationStatus', '1')->get();
		return view('Admin.ProductFile.add_product', ['categories'=>$categories]);
	}
	public function saveProduct(Request $request)
	{
		$productPic = $request->file('productPicture');
		$name = $productPic->getClientOriginalName();
		
		$uploadPic = 'uploadImg/';
		$productPic->move($uploadPic, $name);
		$imgDBUrl = $uploadPic.$name;
		
		$product = new Product();
		$product->productName = $request->productName;
		$product->productId = $request->productCategory;
		$product->productPrice = $request->productPrice;
		$product->productQuantity = $request->productQuantity;
		$product->productDescription = $request->productDescription;
		$product->productPicture = $imgDBUrl;
		$product->publicationStatus = $request->publicationStatus;
		$product->save();
		
		return redirect('/add-product')->with('msg', ' Successfully Product Save Into Database');
	}
	public function manageProduct()
	{
		$products = DB::table('products')
            ->join('categories', 'products.productId', '=', 'categories.id')
            ->select('products.*', 'categories.categoryName')
            ->get();
			
			return view('Admin.ProductFile.manage_product', ['products'=>$products]);
	}
	public function viewProduct($id)
	{
		$productview = DB::table('products')
            ->join('categories', 'products.productId', '=', 'categories.id')
            ->select('products.*', 'categories.categoryName')
            ->where('products.id', $id)
			->first();
			
			return view('Admin.ProductFile.view_product', ['product'=>$productview]);
	}
	public function editProduct($id)
	{
			
		$productById = DB::table('products')
            ->join('categories', 'products.productId', '=', 'categories.id')
            ->select('products.*', 'categories.categoryName')
            ->where('products.id', $id)
            ->first();
			
			$categories = Category::all();
			
			return view('Admin.ProductFile.edit_product', ['product'=>$productById, 'categories'=>$categories]);
			
	}
	public function updateProduct(Request $request)
	{
		$product = Product::find($request->productsId);
		
		$productImage = $request->file('productPicture');
		
		if($productImage){
			unlink($product->productPicture);
			$imageName = $request->productsId.$productImage->getClientOriginalName();
			$uploadPath = 'uploadImg/';
			
			$productImage->move($uploadPath, $imageName);
			
			$imageUrl = $uploadPath.$imageName;
			
		}else{
			echo $imageUrl = $product->productPicture;
		}
		
		$product->productName = $request->productName;
		$product->productId = $request->productCategory;
		$product->productPrice = $request->productPrice;
		$product->productQuantity = $request->productQuantity;
		$product->productPicture = $imageUrl;
		$product->publicationStatus = $request->publicationStatus;
		$product->save();
		
		return redirect('/manage-product')->with('msg', ' Successfully Product Update Database');
	}
	public function deleteProduct($id)
	{
		$product = Product::find($id);
		unlink($product->productPicture);
		
		$product->delete();
		return redirect('/manage-product');
	}
}









