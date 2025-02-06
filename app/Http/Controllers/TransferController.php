<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\GuestTailorMail;
use App\Mail\TransferServic;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        return view('TransferService');
    }
    public function submitting(Request $request){


        $data=$request->all();

        \Mail::to('mrboogiewoogie719@gmail.com')->send(new TransferServic($data));
        $text="Welcome To Our Family !";
        $thanks="Thanks For Booking With Us";
        $route='Transfer.index';
        return view('landing.Responding',compact('text','thanks','route'));      }
}
