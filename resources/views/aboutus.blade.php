@extends('layouts.app')

@section('content')

<main>
    <!--/*row 1*/-->
    <div class="container cont6 p-0">
        <div class="row m-0">
            <div class="col-lg-12">
                <p>Home / About</p>
            </div>
        </div>
        <div class="row m-0 mt-3">
            <div class="col-lg-12 justify-content-center text-center mt-3 animated bounceInUp">
                <h1 class="abouth">ABOUT</h1>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-lg-12 justify-content-center text-center mt-2 mb-5 animated bounceInUp">
                <p class="aboutp">Lorem ipsum dolor sit amet enim. Etiam ullamcorp uspendisse a pellentesque.</p>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-lg-6 justify-content-center text-center mt-2 animated jackInTheBox">
                <img class="img-fluid" src="images/about1.jpg" alt="">
            </div>
            <div class="col-lg-6 justify-content-center text-center mt-2 animated jackInTheBox">
                <img class="img-fluid" src="images/about2.jpg" alt="">
            </div>
        </div>
        <div class="row m-0">
            <div class="col-lg-6 mt-5 animated jackInTheBox">
                <h2 class="abouth2">WHO WE ARE?</h2>
                <p>Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim.
                    <br>
                    <br>

                    Phasellus fermentum in, dolor. Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada fames ac turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Aliquam erat ac ipsum. Integer aliquam purus. Quisque lorem tortor fringilla sed, vestibulum id, eleifend </p>
            </div>
            <div class="col-lg-6 mt-5 pb-3 animated jackInTheBox">
                <h2 class="abouth2">WHAT WE ARE DOING?</h2>
                <p>Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim.
                    <br>
                    <br>

                    Phasellus fermentum in, dolor. Pellentesque facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada fames ac turpis velit, rhoncus eu, luctus et interdum adipiscing wisi. Aliquam erat ac ipsum. Integer aliquam purus. Quisque lorem tortor fringilla sed, vestibulum id, eleifend </p>
            </div>
        </div>
        <hr>






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








@endsection
