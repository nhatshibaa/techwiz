<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function getContact(){
    	return view('page.contact');
    }

    public function postContact(Request $req){
    	$data = $req->except('_token');
    	Contact::insert($data);
    	return redirect()->back()->with('success', 'Thank you for contacting us, we will process your contact as soon as possible! Thank you  !');
    }
}
