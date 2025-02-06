<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\City;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $cities=City::all();
        return view('Blog.index',['cities' => $cities]);
    }

    public function show(City $city)
    {
        $cityAttractions=Blog::where('city_id', $city->id)->get();
        $city=$city->name;
        return view('Blog.show',compact('cityAttractions','city'));
    }

    public function Attraction(City $city,Blog $blog)
    {
        return view('Blog.blog',compact('city','blog'));
    }
}



