<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        //laatste 9 producten uit database halen
        $latestproducts = Product::orderBy('id', 'desc')->take(3)->get();

        //best verkochte producten uit database
        $toporderedproducts =
            DB::table('products')
        ->select( 'products.id','title','body','quantity','products.photo_id','quantity','title','products.price', 'photos.file', DB::raw('SUM(amount) as TotalOrdered'))
        ->join('order_product', 'products.id', '=', 'order_product.product_id')
            ->leftJoin('photos','products.photo_id','=','photos.id')
        ->groupBy('product_id')
        ->orderBy('TotalOrdered','DESC')
        ->take(3)
        ->get();
        return view('home', compact('latestproducts','toporderedproducts' ,'photo'));

    }

    public function payment()

    {
        //Kijken welke user er is ingelogd
        $user = Auth()->user();
        //De user zijn orders eruithalen met bijhorende producten
        $orders = $user->orders()->with('products');
        return view('paymentsuccess',compact('user','orders'));
    }
}
