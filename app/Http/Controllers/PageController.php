<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use Auth;
use App\News;
use Cart;

use App\ProductType;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $news=News::all();
        /*$products= Cart::content();*/
        $new_product = Product::where('new',1)->get();
        $sale_product =Product::where('promotion_price','<>',0)->get();
        $hot_product = Product::where('hot',1)->get();
        /*dd($new_product);*/
    	return view('page.index',compact('slide','new_product','sale_product','hot_product','news'));
    }

    public function getProduct($type){
        $product =Product::all();
        $type_product =ProductType::all();
        $sp_theoloai = Product::where('id_type',$type) ->get();
    	return view('page.product',compact('type_product','sp_theoloai','product'));
    }

    public function getProductdetail(Request $req){
        $product =Product::all();
        $type_product =ProductType::where('id',$req->id)->first();
        $productdetail= Product::where('id',$req->id)->first();
        $relatied =  Product::where('id_type',$productdetail->id_type)->get();
    	return view('page.productdetail',compact('productdetail','relatied','type_product'));
    }


    public function getAbout(){
    	return view('page.about');
    }

    public function getCart(){
    	return view('page.cart');
    }

     public function getLogout(){
        Auth::logout();
        return redirect(route('home'));
    }


}
