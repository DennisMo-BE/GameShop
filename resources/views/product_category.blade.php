@extends('layouts.app')

@section('content')
    <div class="container cont6 p-0">
        <div class="row m-0">
            <div class="col-12">
                <p>Home / Products /  {{$productbycat->name}}</p>
            </div>
        </div>
        <ul class="list-inline m-0">
            <li class="list-group-item col-1 text-center">  <a href="/games">All</a></li>
            @foreach($categories as $category)

                <li class="list-group-item col-1 text-center">  <a href="{{route('games/cat',$category->id)}}">{{$category->name}}</a></li>

            @endforeach

        </ul>

        <div class="row m-0 mt-5 mb-6">
        @foreach($productbycat->products as $product)
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
        </div>
    </div>


@endsection

