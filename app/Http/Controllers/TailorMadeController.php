<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\GuestTailorMail;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class TailorMadeController extends Controller
{
    public function index(){
        return view('TailorMade');
    }

     public function submitting(Request $request){


        $customerTailor=$request->all();
        \Mail::to('mahmodaborakika2@gmail.com')->send(new GuestTailorMail($customerTailor));
         $text="Your Message Has Been Sent !";
         $thanks="Thanks For Contacting Us";
         $route='TailorMade.index';
         return view('landing.Responding',compact('text','thanks','route'));
    }
}
