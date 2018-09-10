@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Search</h1>
        @if(isset($details))
            <p> The Search results for <b> {{ $query }} </b> are :</p>

            <table class="table table-striped">

                <tbody>
                @foreach($details as $product)
                    <div class="col-lg-3 justify-content-center text-center animated bounceInDown mb-lg-5">

                        <img src="{{$product->photo ? $product->photo->file : 'http://placehold.it/400x400'}}" class="img-fluid" style="height: 300px;" alt="">
                        <p class="pt-3 m-0"><b>{{$product->title}}</b></p>
                        <p class="">€ {{$product->price}} (excl BTW)</p>
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
                        <a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart mt-1"><i class="fa fa-info"></i> View Details</a>
                    </div>
                @endforeach
                </tbody>
            </table>
        @endif
        @if(Session::has('message'))
            <p class="bg-danger text-center animated bounceInDown" >{{Session('message')}}</p>
        @endif
        <a href="/games"><button class="headbutton animated bounceInUp fa fa-arrow-left"> Check all games</button></a>
    </div>
@endsection

