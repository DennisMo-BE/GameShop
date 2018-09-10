@extends('layouts.app')

@section('content')
    @if(Session::has('warning'))
           <div class="alert text-center alert-warning">
                 {{ Session::get('warning') }}
               </div>
    @endif
    <main>
        <!--/*Cart*/-->
        <div class="container cont8 p-0">
            <div class="row m-0 mt-3">
                <div class="col-lg-12 justify-content-center text-center mt-3">
                    <h1 class="abouth">YOUR SHOPPING BAG</h1>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-lg-12 justify-content-center text-center mt-2 mb-5">
                    <p class="aboutp">Items reserved for limited time only</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 p-0 m-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="p-0 m-0">
                                <th scope="col">Product</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($cart)
                            @foreach($cart as $product)

                                <tr>
                                    <td class="cart_product">
                                        <img src="{{$product->options['photo_id']}}" class="img-fluid" style="height: 60px;" alt="">

                                    </td>
                                    <td class="cart_description">
                                        <h4><a href='{{url("products/details/$product->id")}}'>{{$product->name}}</a></h4>
                                        <p>Web ID: {{$product->id}}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>€{{$product->price}}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">


                                            <a class="cart_quantity_up" href='{{url("cart?product_id=$product->id&increment=1")}}'> + </a>
                                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$product->qty}}" autocomplete="on" size="2">
                                            <a class="cart_quantity_down" href='{{url("cart?product_id=$product->id&decrease=1")}}'> - </a>

                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">€ {{$product->subtotal}}</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" href="{{url("cart?product_id=$product->id&remove=1")}}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>

                            @endforeach
                                    @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row m-0 mt-1">
                <div class="col-12 justify-content-center text-right pt-3 pr-3">
                    <p class="subtotal">Subtotal: <span class="subspan">{{Cart::subtotal()}}</span></p>
                    <p class="subtotal">Tax: <span class="subspan">{{Cart::tax()}}</span></p>
                    <p class="subtotal">Total incl tax: <span class="subspan">{{Cart::total()}}</span></p>
                </div>
            </div>
            <div class="row m-0 mt-5 mb-5">
                <div class="col-lg-12 justify-content-center text-center mt-3">
                    <img src="images/kronkel.png" alt="">
                </div>
            </div>
            <hr>
            <!--/*Shipping ADRESS*/-->
            <form id="payment-form" method="post" action="{{ route('addmoney.stripe') }}" class="text-grey2">
                {{ csrf_field() }}

                <div class="row m-0 mt-3">
                    <div class="col-lg-12 justify-content-center text-center mt-3">
                        <h1 class="abouth">SHIPPING ADRESS</h1>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-lg-12 justify-content-center text-center mt-2 mb-5">
                        <p class="aboutp">All fields are required</p>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6 mt-2 mb-2">
                        <div class="form-group">
                            <label for="exampleSelect1">Standard Delivery</label>
                            <select class="form-control" style="height:35px;" id="exampleSelect1">
                                <option>Bpost</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-3 mt-2 mb-2">
                        <div class="form-group">
                            <label for="firstname">FIRST NAME</label>
                            <input type="text" class="form-control" id="firstname" placeholder="First Name" value="{{ $user->first_name }}">
                        </div>
                    </div>
                    <div class="col-lg-3 mt-2 mb-2">
                        <div class="form-group">
                            <label for="lastname">LAST NAME</label>
                            <input type="text" class="form-control" id="lastname" placeholder="Last Name" value="{{ $user->last_name }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6 mt-2 mb-2">
                        <div class="form-group">
                            <label for="adress1">ADDRESS</label>
                            <input type="text" class="form-control" id="adress" placeholder="Adress" value="{{ $user->address }}">
                        </div>
                    </div>
                    <div class="col-lg-3 justify-content-center text-center mt-2">
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6 mt-2 mb-2">
                        <a href="#" onclick="event.preventDefault(); addDelivery('delivery')">Add Shipping address</a>
                        <div id="delivery" style="display:none;">
                        <div class="form-group" >
                            {!! Form::label('delivery_address', 'Delivery address:') !!}
                            {!! Form::text('delivery_address', null, ['class'=>'form-control']) !!}
                            <p class="text-muted">If its on the same address, dont fill this field in.</p>

                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 justify-content-center text-center mt-2">
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6 mt-2 mb-2">
                        <div class="form-group">
                            <label for="country_id">Country</label>
                            <input type="text" class="form-control" id="country_id" placeholder="country_id" value="{{$user->country->name}}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-3 mt-2 mb-2">
                        <div class="form-group">
                            <label for="city">CITY</label>
                            <input type="text" class="form-control" id="city" placeholder="City" value="{{ $user->city }}">
                        </div>
                    </div>
                    <div class="col-lg-3 mt-2 mb-2">
                        <div class="form-group">
                            <label for="postal_code">POSTAL CODE</label>
                            <input type="text" class="form-control" id="postal_code" placeholder="Postal Code" value="{{ $user->postal_code }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-3 mt-2 mb-2">
                        <div class="form-group">
                            <label for="phone">PHONE NUMBER</label>
                            <input type="text" class="form-control" id="lol" placeholder="Phone" value="{{ $user->phone }}">
                        </div>
                    </div>
                    <div class="col-lg-3 mt-2 mb-2">
                        <div class="form-group">
                            <label for="email">EMAIL</label>
                            <input type="text" class="form-control" id="email" placeholder="Email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>


                <hr>

                <div class="row m-0 mt-5 mb-5">
                    <div class="col-lg-12 justify-content-center text-center mt-3">
                        <img src="images/kronkel.png" alt="">
                    </div>
                </div>
                <hr>
                <!-- PAYMENT OPTIONS -->
                <div class="row m-0 mt-5">
                    <div class="col-lg-12 justify-content-center text-center mt-3">
                        <h1 class="abouth">PAYMENT OPTIONS</h1>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-lg-12 justify-content-center text-center mt-2 mb-5">
                        <p class="aboutp">All fields are required</p>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-lg-12 justify-content-center text-center mt-1">
                        <p class="totalp">Subtotal: <span class="totalitalic">{{Cart::total()}}</span></p>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-lg-12 justify-content-center text-center mt-1">
                        <p class="totalp">Shipping: <span class="totalitalic">Free</span></p>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-lg-12 justify-content-center text-center mt-1">
                        <p class="totalpo">Total: <span class="totalitalic">€ {{Cart::total()}}</span></p>
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-6 offset-3">
                        <article class="card">
                            <div class="card-body p-5">
                                <p> <img src="http://bootstrap-ecommerce.com/main/images/icons/pay-visa.png">
                                    <img src="http://bootstrap-ecommerce.com/main/images/icons/pay-mastercard.png">
                                    <img src="http://bootstrap-ecommerce.com/main/images/icons/pay-american-ex.png">
                                </p>


                                <div class="form-group">
                                    <label for="cardNumber">Card number</label>

                                    <div class="input-group m-0 text-center">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                                        </div>
                                        <input autocomplete='off' class='form-control' card-number size='20' type='text'
                                               name="card_no">
                                    </div> <!-- input-group.// -->
                                </div> <!-- form-group.// -->

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class='control-label'>Expiration</label>
                                            <input class='form-control card-expiry-month' placeholder='MM' size='2'
                                                   type='text' name="ccExpiryMonth">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">  <label class='control-label'>Year </label>
                                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                               type='text' name="ccExpiryYear">
                                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                               type='hidden' name="amount" value="300"></div>

                                    <div class="col-sm-4 m-0">
                                        <div class="form-group">
                                            <label class='control-label'>CVV</label>
                                            <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311'
                                                   size='4' type='text' name="cvvNumber">
                                        </div> <!-- form-group.// -->
                                        <div class='form-control total !btn btn-success mb-4'>
                                            Total:
                                            <span class=’amount’>€ {{Cart::total()}}</span>
                                        </div>
                                        <button class='form-control !btn btn-primary submit-button' type='submit'>Pay
                                            »</button>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </form>

        </div>




        <hr>






        </div>
    </main>
    <footer>
        <!--Footer-->
        <div class="container cont4 p-0">
            <div class="row p-0 m-0">
                <div class="col-sm-3">
                    <div class="link-area0 pl-3">
                        <h3>COLLECTION</h3>
                        <ul>
                            <li><a href="categorywomen.html"> Women</a></li>
                            <li><a href="categorymen.html"> Men</a></li>
                            <li><a href="categorykids.html"> Kids</a></li>
                            <li><a href="#"> Coming Soon!</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="link-area pl-3">
                        <h3>SITE</h3>
                        <ul>
                            <li><a href="#"> Terms Of Service</a></li>
                            <li><a href="#"> Privacy Policy</a></li>
                            <li><a href="#"> Copyright Policy</a></li>
                            <li><a href="#"> Press kit</a></li>
                            <li><a href="#"> Support</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="link-area pl-3">
                        <h3>SHOP</h3>
                        <ul>
                            <li><a href="aboutus.html"> About us</a></li>
                            <li><a href="#"> Shipping Methods</a></li>
                            <li><a href="#"> Career</a></li>
                            <li><a href="contact.html"> Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="link-area pl-3 text-center text-md-left">
                        <h3>SOCIAL</h3>
                        <P class="foterp">Shopper is made with love in Warsaw.</P>
                        <p class="foterp">2014 All rights reserved. El passion</p>
                        <img src="images/twitter.png" class="mr-2" alt="twitter">
                        <img src="images/fb.png" class="mr-2" alt="facebook">
                        <img src="images/insta.png" class="" alt="instagram">

                    </div>
                </div>
            </div>
        </div>

    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("a").click(function(){
                $("#delivery").toggle();
            });
        });
    </script>
@endsection



