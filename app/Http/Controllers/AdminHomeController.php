<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use App\Order;
use App\Photo;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminHomeController extends Controller
{
    //Een overzicht van alle producten,users,categories en orders die we optellen bij elkaar voor het totale te krijgen
    //Als ook de laatste 5 orders en producten die zijn toegevoegd aan de database
    //'Dashboard"
    public function index()
    {
        $user = Auth::user();
        $totalproducts = Product::all()->count();
        $totalorders = Order::all()->count();
        $totalusers = User::all()->count();
        $totalphotos = Photo::all()->count();
        $orders = Order::orderBy('id', 'desc')->take(5)->get();
        $products = Product::orderBy('id', 'desc')->take(5)->get();



        return view('admin.index',compact('user','totalproducts','totalorders','totalusers','totalphotos','orders','products','productsordered'));
    }
}
