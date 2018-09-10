@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach($categories as $category)


            <a href="{{route('games/cat',$category->id)}}">{{$category->name}}</a>


        @endforeach
        <h1>Category: {{$productbycat->name}}</h1>
        @foreach($productbycat->products as $product)
            <div class="col-lg-3 justify-content-center text-center animated bounceInDown mb-lg-5">

                <img src="{{$product->photo ? $product->photo->file : 'http://placehold.it/400x400'}}" class="img-fluid" style="height: 300px;" alt="">
                <p class="pt-3 m-0"><b>{{$product->title}}</b></p>
                <p class="">€ {{$product->price}} (excl BTW)</p>
                <form method="POST" action="{{url('cart')}}">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary add-to-cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </button>
                </form>
                <a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart mt-1"><i class="fa fa-info"></i> View Details</a>
            </div>

    </div>
    </div>
        @endforeach

        <div class="row m-0 mt-5 mb-6">
        </div>
    </div>
          {{--  @if(!isset($products))
                @foreach($products as $product)
                    <div class="col-lg-3 justify-content-center text-center animated bounceInDown mb-lg-5">

                        <img src="{{$product->photo ? $product->photo->file : 'http://placehold.it/400x400'}}" class="img-fluid" style="height: 300px;" alt="">
                        <p class="pt-3 m-0"><b>{{$product->title}}</b></p>
                        <p class="">€ {{$product->price}} (excl BTW)</p>
                        <form method="POST" action="{{url('cart')}}">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-primary add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                        </form>
                        <a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart mt-1"><i class="fa fa-info"></i> View Details</a>
                    </div>

        </div>
    </div>


    @endforeach
    @endif--}}

@endsection

