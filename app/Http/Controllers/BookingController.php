<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{

    public function index(Tour $tour){
        $userData=\request()->all();
        $numPerson =
            (int)($userData['Adult'] ?? 0);

        if($numPerson>0 && $numPerson<2)
        {
            $price=(int)$tour->price_per_person;
            $userData['totalPrice']=$this->CalculateTotalPrice($price,$userData);
            $userData['price']=$price;
        }
        else if($numPerson>1 && $numPerson<6)
        {
            $price=(int)$tour->price_two_five;
            $userData['totalPrice']=$this->CalculateTotalPrice($price,$userData);
            $userData['price']=$price;
        }
        else
        {
            $price=(int)$tour->price_six_twenty;
            $userData['totalPrice']=$this->CalculateTotalPrice($price,$userData);
            $userData['price']=$price;
        }
        return view('checkout',compact('tour','userData'));
    }

    public function confirm(Tour $tour ,Request $request)
    {
        $data=$request->input('userData');
        $tourType=$tour->group;
        $tour=$tour->load(['tourTranslations','category.categoryTranslations'])->toArray();
        Mail::to('mahmodaborakika2@gmail.com')->send(new \App\Mail\TourBookingMail($data,$tour));
        Mail::to($data['email'])->send(new \App\Mail\InformUserForBookingMail());

        $text="Your Tour Is Booked!";
        $thanks="Thanks For Booking With Us";
        $route=$tourType.'.'.'index';

        return view('landing.Responding',compact('text','thanks','route'));

    }

    private function CalculateTotalPrice($price,$userData)
    {
        return $userData['Adult']*$price + ($userData['Children_under_12']* + $price + $userData['students'] * $price)*0.5;
    }

}
