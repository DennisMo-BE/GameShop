@extends('layouts.app')

@section('content')

    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <div class="container">
        <h1 class="text-center">Payment Screen</h1>
        <div class="row">

            <div class="col-3"></div>
            <div class="col-6">
                <article class="card">
                    <div class="card-body p-5">
                        <p> <img src="http://bootstrap-ecommerce.com/main/images/icons/pay-visa.png">
                            <img src="http://bootstrap-ecommerce.com/main/images/icons/pay-mastercard.png">
                            <img src="http://bootstrap-ecommerce.com/main/images/icons/pay-american-ex.png">
                        </p>
                        <form class="form-horizontal" method="POST" id="payment-form" role="form"
                              action="{!!route('addmoney.stripe')!!}" >
                            {{ csrf_field() }}

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


                        </form>

                    </div>
                </article>
            </div>
        </div> <!-- card-body.// -->
        </article> <!-- card.// -->
        </div>
    </div>
    </div>



@endsection