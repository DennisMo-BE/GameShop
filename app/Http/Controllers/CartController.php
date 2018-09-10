<?php

namespace App\Http\Controllers;


use App\Category;
use App\Product;
use App\Country;
use App\User;
use App\Photo;
use App\Http\Requests;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;





class CartController extends Controller
{


    var $categories;
    var $products;
    var $title;
    var $cart;
    var $description;
    var $shipping = 5;



    public function __construct()
    {
        $this->middleware('auth');
        $this->categories = Category::all(array('name'));
        $this->products = Product::all(array('id', 'photo_id', 'title', 'price'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //alles producten met relatie photo tabel en categories eruithalen
        $products = Product::with('photo')->get();
        $categories = Category::all();
        return view('cart',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
        //Clear cart
    public function clear_cart(){
        Cart::destroy();
        return redirect::away('cart');

    }

    public function cart(
    )
    {
        $products = Product::all();
        $categories = Category::all();
        $photos = Photo::all();
        $user = Auth::user();
        $countries = Country::countries();


        if (Request::isMethod('post')){
            $product_id = Request::get('product_id');
            $product = Product::find($product_id); //haalt data uit database


            Cart::add(['id'=>$product_id ,'name'=> $product->title, 'qty' => 1, 'price'=>$product->price, 'options' => ['photo_id' => $product->photo->file]]); //roept de cart methode aan en geeft via een  associatieve array de variabelen door

            /* echo '<pre>';
            var_dump(Cart::content());
            echo '</pre>';*/ //toont de code van Cart:content()
        }
        if(Request::get('product_id') && (Request::get('increment')) == 1){
            $item = Cart::search(function($key, $value){
                return $key->id  == Request::get('product_id');
            })->first();
            $product_id = Request::get('product_id');
            $product = Product::find($product_id); //haalt data uit database
            if($product->quantity>$item->qty){
                Cart::update($item->rowId, $item->qty + 1);
            }else{
                return redirect('/cart')->with('warning', 'There are only ' . $product->quantity . ' items in stock of this product');
            }
           /* Cart::update($item->rowId, $item->qty + 1);*/
        }



        if(Request::get('product_id') && (Request::get('decrease')) == 1){
            $item = Cart::search(function($key, $value){
                return $key->id  == Request::get('product_id');
            })->first();
            Cart::update($item->rowId, $item->qty - 1);
        }

        //remove
        if(Request::get('product_id') && (Request::get('remove')) == 1){
            $item = Cart::search(function($key, $value){
                return $key->id  == Request::get('product_id');
            })->first();
            Cart::remove($item->rowId);


        }

        $cart = Cart::content(); //content methode groepeert alle items die als een collectie worden beschouwd

        return view('cart', compact('products','categories','user','countries','photos', 'cart'), array('cart'=> $cart, 'title'=> 'Welcome' , 'description'=> '', 'page'=>'home'));// voegt de collectie toe aan de lijst van de variabelen naar de view

    }




}
