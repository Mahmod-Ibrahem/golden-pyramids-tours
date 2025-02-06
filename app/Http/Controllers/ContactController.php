<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function submitting(Request $request){
        $data=$request->all();
        \Mail::to('mahmodaborakika2@gmail.com')->send(new ContactMail($data));
        $text="Your Message Has Been Sent !";
        $thanks="Thanks For Contacting Us";
        $route='Contact.index';
        return view('landing.Responding',compact('text','thanks','route'));
    }

}
