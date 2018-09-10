<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Product;
use App\Order;

class HistoryController extends Controller
{
    public function index(){
        //Kijken welke user is ingelogd
        $user = Auth()->user();
        //De user zijn orders eruithalen met bijhorende producten
        $orders = $user->orders()->with('products');
        return view('historyorders', compact('user', 'orders'));
    }

}
