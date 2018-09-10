<?php


use App\Product;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index', function () {
    return view('home');
});

Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/games', 'GamesController@index');
Route::get('/aboutus', 'AboutUsController@index');
Route::get('contact-us', 'ContactUSController@contactUS');
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactUSPost']);
Route::get('/cart', 'CartController@cart');
Route::post('/cart', 'CartController@cart');
Route::get('/products/details/{id}', 'ProductDetailsController@index');
Route::get('/editaccount', "AdminUsersController@editaccount")->name('editaccount');
Route::post('/editaccount', "AdminUsersController@updateaccount")->name('editaccount');
Route::get('/terms', "TermsController@index");
Route::get('/history', 'HistoryController@index')->name('history');
Route::get('/paymentsuccess','HomeController@payment');


Route::get('addmoney/stripe',  array('as'  => 'addmoney.paywithstripe','uses' =>  'AddMoneyController@payWithStripe'));
Route::post('addmoney/stripe',  array('as'  => 'addmoney.stripe','uses' =>  'AddMoneyController@postPaymentWithStripe'));


Route::any('/games/cat/{id}',[
    'uses'=> 'GamesController@show',
    'as' => 'games/cat'
]);


Route::any ( '/search', function () {
    $q = Input::get ( 'q' );
    $product = Product::where ( 'title', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $product ) > 0){
        Session::forget('message');
        return view ( 'search' )->withDetails ( $product )->withQuery ( $q );

    }
    else{
    Session::flash('message','Geen resultaten, probeer iets anders');
    return view ( 'search' );
    }

    /*return Redirect::to('welcome')->with('message', 'Login Failed');*/
       /* return view ( 'welcome' )->with('status', 'Item deleted successfully.');*/
} );
/*** ROUTES ***/
/* ADMIN ROUTE EN ZIJN MIDDLEWARE BEVEILIGING**/
Route::group(['middleware'=> 'admin',],function(){
    Route::get('/admin',"AdminHomeController@index",function(){
        return view('admin.index');
    });
    Route::resource('admin/users', "AdminUsersController");
    Route::resource('admin/posts', "AdminPostsController");
    Route::resource('admin/products', "AdminProductsController");
    Route::resource('admin/categories', "AdminCategoriesController");
    Route::resource('admin/media', "AdminMediasController");
    Route::resource('admin/comments', "PostCommentsController");
    Route::resource('admin/comment/replies', "CommentRepliesController");
    Route::resource('admin/orders', "AdminOrderController");
});

