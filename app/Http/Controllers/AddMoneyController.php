<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\Order;
use App\Stock;
use App\User;

use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;
class AddMoneyController extends Controller
{
    public function payWithStripe()
    {
        return view('paywithstripe');
    }



    public function postPaymentWithStripe(Request $request)
    {
        $product = Product::all();
        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear' => 'required',
            'cvvNumber' => 'required',

//’amount’ => ‘required’,
        ]);
        $input = $request->all();
        if ($validator->passes()) {
            $input = array_except($input, array('_token'));
            $stripe = Stripe::make('sk_test_caWsOkI6lJT2AWRv1uJLRUBh');
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $request->get('card_no'),
                        'exp_month' => $request->get('ccExpiryMonth'),
                        'exp_year' => $request->get('ccExpiryYear'),
                        'cvc' => $request->get('cvvNumber'),
                    ],
                ]);
                /*         $token = $stripe->tokens()->create([
                             'card' => [
                                 'number' => "4242424242424242",
                                 'exp_month' => 10,
                                 'cvc' => 314,
                                 'exp_year' => 2020,
                             ],
                         ]);*/
                var_dump($token);

                if (!isset($token['id'])) {
                    return redirect()->route('addmoney.paywithstripe');
                }
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'EUR',
                    'amount' => Cart::total(),
                    'description' => 'Add in wallet',

                ]);





                //all de de batling is gebeurt maak je hier een order op
                if ($charge['status'] == 'succeeded') {
                    $input = $request->all();
                    $order = [];


                    //Alle info van de ingelogde user voor in de order tabel
                    $user = Auth::user();
                    if($user && true) {
                        $order['user_id'] = $user->id;
                        $order['first_name'] = $user->first_name;
                        $order['last_name'] = $user->last_name;
                        $order['email'] = $user->email;
                        $order['country_id'] = $user->country_id;
                        $order['city'] = $user->city;
                        $order['postal_code'] = $user->postal_code;
                        $order['address'] = $user->address;
                        $order['payment_method'] = 'Credit Card';
                        $order['total'] = Cart::total();
                        $order['status'] = 'Paid';

                    }

                    //als de user een delivery address invult zal er een nieuw address worden toegevoegd aan de kolom anders wordt zijn 'gewoon' adress ingevuld
                    if($input['delivery_address']){
                        $order['delivery_address'] = $input['delivery_address'];
                    }else{
                        $order['delivery_address'] = $user->address;
                    }
                    //order maken
                    $order = Order::create($order);


                    //Content van de cart toevoegen aan de tussentabbel
                    foreach(Cart::content() as $content){
                        $order->products()->attach($content->id, ['price' => $content->price*$content->qty*1.21, 'amount' => $content->qty,'product_name' => $content->name,'product_id' => $content->id, 'created_at' => date_create()]);

                    };
                    //alle producten verminderen van voorraad met de bestelde waarden
                    foreach (Cart::content() as $content) {
                        $product = Product::find($content->id);
                        $product->decrement('quantity', $content->qty);
                    }


                    /**
                     * Schrijf hier zelf je insert voor je database.
                     */
                    //echo "<pre>";
                    //print_r($charge);exit();
                    //cart legen en redirecten
                    Cart::destroy();
                    return redirect('paymentsuccess')->with('success', 'Product purchased and paid!');

                } else {
                    \Session::put('error', 'Money not add in wallet!!');
                    return redirect()->route('addmoney.paywithstripe');
                }
            } catch (Exception $e) {
                \Session::put('error', $e->getMessage());
                return redirect()->route('addmoney.paywithstripe');
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
                \Session::put('error', $e->getMessage());
                return redirect()->route('addmoney.paywithstripe');
            } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                \Session::put('error', $e->getMessage());
                return redirect()->route('addmoney.paywithstripe');
            }

//            }

        }

    }




}