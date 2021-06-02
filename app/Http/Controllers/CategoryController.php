<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;

class CategoryController extends Controller
{
    public function category(){

    	$category = ProductType::all();

    	return view('admin.category.list',compact('category'));
    }
    /*thêm danh mục*/
    public function getCategory(){
    	return view('admin.category.add');
    }
    public function postCategory(Request $req){

    	$data = $req->except('_token');
    	ProductType::insert($data);
    	return redirect(route('category'))->with('success','Add success');
    }

   /* sửa danh mục*/

   	public function getEdit($id){
   		$editcate = ProductType::find($id);
   		return view('admin.category.edit',compact('editcate'));
   	}

   	public function postEdit(Request $req ,$id){
   		$add= ProductType::find($id);
   		$this->validate($req,
   			[
   				'name'=>'required|min:3'
   			],
   			[
   				'name.required'=>'Category name cannot be left blank ',
   				'name.min'=>'Category name must not be less than 3 characters '
   			]);

   		$add->name= $req->name;
   		$add->save();
    	return redirect(route('category'))->with('success','Update Sucess');
   	}

   	/*xóa danh mục*/

   	public function delete($id){
   		$delete = ProductType::find($id);
        $delete->delete();
        return redirect()->back()->with('success','Delete success');
   	}
}
