<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    //
	public function addCategory()
	{
		return view('Admin.CategoryFile.add_category');
	}
	public function saveCategory(Request $request)
	{	
		$input = $request->all();
		Category::create($input);
		return redirect('/add-category')->with('msg', 'Category Saved In Database successfully');
	}
	public function manageCategory()
	{
		//$alldata=Category::all();
		$alldata = DB::table('categories')->simplePaginate(5);
		return view('Admin.CategoryFile.show_category', compact('alldata'));
	}
	public function editCategory($id)
	{
		$editdata=Category::findOrFail($id);
		return view('Admin.CategoryFile.edit_category', compact('editdata'));
	}
	public function updateCategory(Request $request)
	{
		$input = $request->all();
		$updatedata = Category::find($request->editdata);
		$updatedata->update($input);
		return redirect('/manage-category');
	}
	public function deleteCategory($id)
	{
		$deletedata = Category::find($id);
		$deletedata->delete();
		return redirect('/manage-category');
	}
}















