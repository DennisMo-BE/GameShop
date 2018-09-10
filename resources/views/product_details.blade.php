@extends('layouts.app')

@section('content')

<main>
    <!--/*row 1*/-->
    <div class="container cont7 p-0">
        <div class="row m-0">
            <div class="col-12">
                <p>Home / Games / {{$product->title}}</p>
            </div>
        </div>
        <div class="row m-0 mt-3">
            <div class="col-12 justify-content-center text-center">
                <img src="{{$product->photo ? $product->photo->file : 'http://placehold.it/400x400'}}" style="height:350px;" class="img-fluid" alt="">
            </div>
        </div>
        <div class="row m-0 mt-5">
            <div class="col-12 justify-content-center text-center">
                <h1 class="floralplim">{{$product->title}}</h1>
            </div>
        </div>
        <div class="row m-0 mt-1">
            <div class="col-12 justify-content-center text-center">
                <p class="artnumb">Web ID: {{$product->id}}</p>
            </div>
        </div>
        <div class="row m-0 mt-1">
            <div class="col-12 justify-content-center text-center">
                <p class="pricetag">€ {{$product->price}}</p>
            </div>
        </div>
        <div class="row m-0 mt1">
            <div class="col-12 justify-content-center text-center">
                <p class="descr">{{$product->body}}</p>
            </div>
        </div>

        <div class="row m-0 mt-3 mb-6 d-flex justify-content-center">
            <form method="POST" action="{{url('cart')}}">
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if($product->quantity == 0)
                    <button type="button"  class="!btn btn-danger">
                        <i class="fa fa-times"></i>
                        Out of stock
                    </button>
                @else
                    <button type="submit" class="!btn btn-primary add-to-cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </button>

                @endif
            </form>

        </div>
        <a href="/games"><button class="headbutton animated bounceInUp fa fa-arrow-left"> Check all games</button></a>



    </div>

    <hr>

    <!--/*Container Sign up with email*/-->
    <div class="container cont3 p-0">
        <div class="row p-0 m-0">
            <div class="col-12 justify-content-center text-center mt-5">
                <p class="lookbookp noshowmobile">You may also like</p>
            </div>
        </div>
    </div>

</main>

@endsection

