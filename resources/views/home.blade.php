@extends('layouts.app')

@section('content')
    @if(Session::has('success'))
           <div class="alert alert-success text-center">
                 {{ Session::get('success') }}
               </div>
    @endif
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
        /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>

<header>

        <div class="row m-0">
            <div class="col-12 justify-content-center text-center pt-6 animated fadeIn">
                <h1>GameShop is the stop!</h1>
            </div>
        </div>
        <div class="row m-0 mt-2">
            <div class="col-12 justify-content-center text-center">
                <p class="mb-3 headtext animated fadeIn">Free shipping on all orders</p>
                <a href="/games"><button class="headbutton animated bounceInUp">Check new games!</button></a>
            </div>
        </div>
    </div>
</header>
<main>
    <!--/*Container with grid pictures*/-->
    <div class="container cont2 p-0">
        <div class="row p-0 m-0">
            <div class="col-lg-3 text-center text-md-left p-0">
                <div class="row p-0 m-0">
                    <div class="col-lg-12 text-center p-0">
                        <a href="images/2a.png">
                            <img src="images/2a.png" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="row p-0 m-0">
                    <div class="col-lg-12 text-center p-0">
                        <a href="images/8.png">
                            <img src="images/8.png" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center text-md-left p-0">
                <div class="row p-0 m-0 p-0 m-0">
                    <div class="col-lg-6 text-center p-0"><a href="images/1.png">
                            <img src="images/1.png" class="img-fluid" alt="">
                        </a></div>
                    <div class="col-lg-6 text-center p-0"><a href="images/2.png">
                            <img src="images/2.png" class="img-fluid" alt="">
                        </a></div>
                </div>
                <div class="row p-0 m-0">
                    <div class="col-lg-6 text-center p-0"><a href="images/3.png">
                            <img src="images/3.png" class="img-fluid" alt="">
                        </a></div>
                    <div class="col-lg-6 text-center p-0"><a href="images/4.jpg">
                            <img src="images/4.jpg" class="img-fluid" alt="">
                        </a></div>
                </div>
                <div class="row p-0 m-0">
                    <div class="col-lg-6 text-center p-0"><a href="images/5.jpg">
                            <img src="images/5.jpg" class="img-fluid" alt="">
                        </a></div>
                    <div class="col-lg-6 text-center p-0"><a href="images/6.png">
                            <img src="images/6.png" class="img-fluid" alt="">
                        </a></div>
                </div>
            </div>
            <div class="col-lg-3 text-center text-md-left p-0">
                <div class="row p-0 m-0">
                    <div class="col-lg-12 text-center p-0">
                        <a href="images/7.png">
                            <img src="images/7.png" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="row p-0 m-0">
                    <div class="col-lg-12 text-center p-0">
                        <a href="images/2b.png">
                            <img src="images/2b.png" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container cont3 p-0">
        <div class="row p-0 m-0">
            <div class="col-12 justify-content-center text-center mt-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Recently added</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Top games</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><h2 class="mb-6">Latest products</h2>
                        @if($latestproducts)
                        @foreach($latestproducts as $product)

                            <div class="col-lg-4 justify-content-center text-center animated bounceInDown mb-lg-5">
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
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h2 class="mb-6">Top ordered games</h2>
                        @if($toporderedproducts)
                        @foreach($toporderedproducts as $product)
                            <div class="col-lg-4 justify-content-center text-center animated bounceInDown mb-lg-5">
                             <img src="/images/{{$product->file}}" class="img-fluid" style="height: 300px;" alt="">
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
                            @endif

                    </div>
                </div>
            </div>
        </div>
    <!--/*Container Sign up with email*/-->
    <div class="container cont3 p-0">
        <div class="row p-0 m-0">
            <div class="col-12 justify-content-center text-center mt-5">
                <h2>Subscribe to our newsletter</h2>
                <p class="headtext2 pb-2">Krijg ieder maand een nieuwsbrief met tal van kortingen en nieuwe updates.</p>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="col-lg-4 p-0"></div>
            <div class="col-lg-4 p-0">
                <div class="well" id="mc_embed_signup">
                    <form action="https://facebook.us18.list-manage.com/subscribe/post?u=1c0de9999e64f47cd116da4bb&amp;id=32b392c826" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <div class="mc-field-group">
                                <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                                </label>
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                            </div>
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_1c0de9999e64f47cd116da4bb_32b392c826" tabindex="-1" value=""></div>
                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-success text-center ml-0"></div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="row p-0 m-0">
            <div class="col-12 justify-content-center text-center mt-5">
                <p class="lookbookp noshowmobile">All consoles we support!</p>
            </div>
        </div>
        <div id="carouselExample" class="carousel slide	mt-2 pl-3 pr-3" data-ride="carousel" data-interval="9000">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                <div class="carousel-item col-md-4 active">
                    <img class="img-fluid mx-auto d-block" src="images/sliderimg.jpg?text=1" alt="slide 1">
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="images/sliderimg1.jpg?text=2" alt="slide 2">
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="images/sliderimg2.jpg?text=3" alt="slide 3">
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="images/sliderimg3.jpg?text=4" alt="slide 4">
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="images/sliderimg4.jpg?text=5" alt="slide 5">
                </div>
                <div class="carousel-item col-md-4">
                    <img class="img-fluid mx-auto d-block" src="images/sliderimg5.jpg?text=6" alt="slide 6">
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
    </div>
</main>

    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
    @include('layouts.footer')
@endsection
