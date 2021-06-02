<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Mail;

class ShoppingcartController extends Controller
{
    public function addProduct(Request $req,$id){
    	$product=Product::select('name','id','unit_price','promotion_price','image')->find($id);

    	if(!$product) return redirect(route('home'));

        /*$price = $product->unit_price;
        if ($product->promotion_price) {

            $price = $price*(100-$product->promotion_price)/100;

        }*/
        /*dd($product);*/
    	Cart::add([
    		'id' => $id,
    		'name' => $product->name,
    		'qty' => 1,
            'price' => $product->unit_price,

    		'weight' => 550,
    		'options' => [
                'image' =>  $product->image,
                'sale'=> $product->promotion_price,
                /*'price_old'=>$product->promotion_price*/

            ]
    	]);
    	return redirect()->back();
    }
    public function getList(){
    	$products= Cart::content();
    	return view('page.cart',compact('products'));
    }

    public function getCheckout(){
    	$products= Cart::content();
    	return view('page.checkout',compact('products'));
    }
    /*lưu thông tin đơn hàng*/
    public function postCheckout(Request $req){
        $totalMoney = str_replace(',','',Cart::subtotal());
        $billId=Bill::insertGetId([
            'id_customer'=>get_data_user('web'),
            'total'=>$totalMoney,
            'date_order'=>date('Y-m-d'),
            'status'=>0,
            'payment'=>$req->payment_method,
            'note'=>$req->notes
        ]);

        if($billId)
        {
            $products= Cart::content();
            foreach ($products as $product) {
                BillDetail::insert([
                    'id_bill'=>$billId,
                    'id_product'=>$product->id,
                    'quantity'=>$product->qty,
                    'unit_price'=>$product->price,
                ]);
            }
        }
        $email= $req->email;
        $checkUser= User::where('email',$email)->first();
//        Mail::send('email.get_oder', array('name'=>$req->name,'email'=>$req->email),function($message) use($checkUser){
//            $message->to('Visitor', 'tranthanh72727@gmail.com')->subject('There is 1 new order!');
//        })
        ;
        Cart::destroy();
        return redirect()->back()->with('success','You have successfully ordered, please wait for the processing! Check in your email inbox');
    }

     public function deleteProduct($key){
     	Cart::remove($key);
     	return redirect()->back();
     }
}
