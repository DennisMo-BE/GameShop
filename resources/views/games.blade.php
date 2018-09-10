@extends('layouts.app')

@section('content')

<main>
    <!--/*row 1*/-->
    <div class="container cont6 p-0">
        <div class="row m-0">
            <div class="col-12 pr-2">
                <p>Home / Products</p>
            </div>
        </div>
        <ul class="list-inline m-0 ">
            <li class="list-group-item col-1  just text-center">  <a href="/games">All</a></li>
            @if($categories)
        @foreach($categories as $category)
                <li class="list-group-item col-1  text-center">  <a href="{{route('games/cat',$category->id)}}">{{$category->name}}</a></li>
        @endforeach
                @endif
        </ul>

        <div class="row m-0 mt-5 mb-6">
            @if($products)
          @foreach($products as $product)

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
                          {{--  <button type="submit" class="!btn btn-primary add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>--}}
                        </form>
                        <a href='{{url("products/details/$product->id")}}' class="btn btn-default add-to-cart mt-1"><i class="fa fa-info"></i> View Details</a>
                    </div>
            @endforeach
                @endif


        </div>

        <div class="row m-0 mt-5">
            <div class="col-lg-12 text-center">
                <nav aria-label="...">
                    <ul class="pagination justify-content-center text-center">
                        {{$products->links()}}
                    </ul>
                </nav>
            </div>

        </div>

        <hr>
    </div>
    <!--/*Container Sign up with email*/-->
    <div class="container cont3 p-0">
        <div class="row p-0 m-0">
            <div class="col-12 justify-content-center text-center mt-5">
                <p class="lookbookp noshowmobile">Check our lookbook</p>
            </div>
        </div>
        <div id="carouselExample" class="carousel slide	mt-2 pl-3 pr-3" data-ride="carousel" data-interval="9000">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                <div class="carousel-item col-md-4 active">
                    <img class="img-fluid mx-auto d-block" src="images/sliderimg.jpg?text=1" alt="slide 1">
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="images/sliderimg.jpg?text=2" alt="slide 2">
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="images/sliderimg.jpg?text=3" alt="slide 3">
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="images/sliderimg.jpg?text=4" alt="slide 4">
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="images/sliderimg.jpg?text=5" alt="slide 5">
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="images/sliderimg.jpg?text=6" alt="slide 6">
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="images/sliderimg.jpg?text=7" alt="slide 7">
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="images/sliderimg.jpg?text=8" alt="slide 7">
                </div>
            </div>
            <a class="carousel-control-prev pr-7" href="#carouselExample" role="button" data-slide="prev">
                <i class="fa fa-chevron-left fa-lg text-muted"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next text-faded pl-7" href="#carouselExample" role="button" data-slide="next">
                <i class="fa fa-chevron-right fa-lg text-muted"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</main>
    @include('layouts.footer')



@endsection
