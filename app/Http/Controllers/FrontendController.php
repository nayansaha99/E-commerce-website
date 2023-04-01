<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontendController extends Controller
{
    public function index(){
      $products = Product::where('status',1)->latest()->get();
      return view('pages.index',compact('products'));
    }
}
