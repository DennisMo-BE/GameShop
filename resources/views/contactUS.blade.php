@extends('layouts.app')

@section('content')
    <main>
        <div class="container cont6 p-0">
            <div class="row m-0">
                <div class="col-lg-12">
                    <p>Home / Contact</p>
                </div>
            </div>
        <!--/*row 1*/-->
        <div class="container">
            <h1>Contact US Form</h1>

            @if(Session::has('success'))
                   <div class="alert alert-success">
                         {{ Session::get('success') }}
                       </div>
            @endif

            {!! Form::open(['route'=>'contactus.store']) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('Name:') !!}
                {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                {!! Form::label('Email:') !!}
                {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>

            <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                {!! Form::label('Message:') !!}
                {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}
                <span class="text-danger">{{ $errors->first('message') }}</span>
            </div>
            <div class="form-group {{ $errors->has('g-recaptcha-response') ? 'has-error' : '' }}">
                <div class="g-recaptcha animated bounceInUp" data-sitekey="6LcHDl0UAAAAAEzftwWpFAq3-uuwcn3eo_Y5c8As"></div>
                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
            </div>



            <div class="form-group mt-4">
                <button class="btn btn-success">Contact US!</button>
            </div>

            {!! Form::close() !!}

        </div>

        <!--/*Container Sign up with email*/-->
        <div class="container cont3 p-0">
            <div class="row p-0 m-0">
                <div class="col-12 justify-content-center text-center mt-5">
                    <p class="lookbookp noshowmobile">You may also like</p>
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


    <script src='https://www.google.com/recaptcha/api.js'></script>

@endsection
