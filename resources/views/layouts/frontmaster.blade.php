<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
      <meta content="Responsive Bootstrap Multi-Purpose Crypto Trading User Interface" name="description" />
        <meta name="keywords" content="crypto, Bootstrap, bitcoins, ethereum, dogecoin, iota, ripple, siacoin, exchange, trading platform, crypto trading">
      <meta name="author" content="">
      <title>CRYEX - </title>
      <link rel="stylesheet" href="{{URL::asset('tradify/css/bootstrap.css')}}">
      <link rel="stylesheet" href="{{URL::asset('tradify/plugins/fontawesome/css/font-awesome.css')}}">
      <link rel="stylesheet" href="{{URL::asset('tradify/plugins/animo/animate%2banimo.css')}}">
      <link rel="stylesheet" href="{{URL::asset('tradify/plugins/csspinner/csspinner.min.css')}}">
      <link rel="stylesheet" href="{{URL::asset('tradify/css/app.css')}}">
      <script src="{{URL::asset('tradify/plugins/modernizr/modernizr.js')}}"></script>
      <script src="{{URL::asset('tradify/plugins/fastclick/fastclick.js')}}"></script>
   </head>


    <body  data-spy="scroll" data-target="#data-scroll">




        <!-- Navbar -->
        <div class="navbar navbar-custom sticky" role="navigation">
            <div class="container">
                <!-- Navbar-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="ti-menu"></i>
                    </button>
                    <!-- LOGO -->
                    <a class="navbar-brand logo" href="landing.html">
                        <i class="fa fa-bitcoin"></i> CRYEX
                    </a>
                </div>
                <!-- end navbar-header -->

                <!-- menu -->
                <div class="navbar-collapse collapse" id="data-scroll">

                    <ul class="nav navbar-nav navbar-left">
                         <li class="active">
                            <a class="scroll-func" href="index.html">Home</a>
                        </li>
                        <li>
                          <a class="scroll-func" href="#">Market</a>

                      </li>
                        <li>
                            <a class="scroll-func" href="#">My Account</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="mx-2">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-user"></i> Register</a>
                        </li>

                        <li class="mx-2">
                           <a href="{{ route('login') }}" class="btn btn-secindary btn-block"><i class="fa fa-key"></i> Login</a>
                        </li>
                    </ul>
                </div>
                <!--/Menu -->
            </div>
            <!-- end container -->
        </div>



        <!-- HOME -->
        <section class="home bg-image2 home-small" id="home">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-wrapper home-intro row vertical-content">
                            <div class="col-md-6 text-center">
                                <h1>CRYEX</h1>
                                <h4 class="normal-font-w">YOUR GO-TO CRYPTO EXCHANGE</h4>
                                <a href="market.html" class="btn btn-custom">Start Trading <i class="fa fa-sign-in"></i></a>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- END HOME -->



        <!-- SERVICES -->
        <section class="section bg-lightgray" id="About">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">

                            <p><span class="fa fa-bar-chart color-blue"></span> What We Do</p>
                            <h2 class="text-uppercase text-blue">Trade Confidently</h2>
                        </div>
                    </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <hr class="light">
                    <p class="text-faded">
                        We provide individuals and businesses a world class experience to buy and sell cutting-edge cryptocurrencies
                        and digital tokens. Crypto is the go-to spot for traders who demand lightning fast trade execution,
                        stable wallets, and industry-best security practices. Whether you are new to trading and cryptocurrencies, or a veteran to both, It
                        was created for you!
                    </p>
                    <div class="row"><a href="index.html" class="btn btn-primary">Get Started Now! <i class="fa fa-sign-in"></i></a></div>
                </div>
            </div>
                <!-- end row -->

            </div> <!-- end container -->
        </section>
        <!-- end SERVICES -->

        <!-- FEATURES -->
        <section class="section services1">
            <div class="container">
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                    <i class="fa fa-money fa-3x color-white"></i>
                   <h3 class="title">Low Fee</h3>
                   <p>0% maker fee and 0.1% taker fee makes us one of the most competitive exchanges on the market</p>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                    <i class="fa fa-lock fa-3x color-white"></i>
                   <h3 class="title">Security</h3>
                   <p>The vast majority of digital assets are stored securely in offline storages</p>
                </div>


                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                    <i class="fa fa-users fa-3x color-white"></i>
                   <h3 class="title">Experienced Team</h3>
                   <p>Our experienced team helps us build the best product and deliver first class service to our clients</p>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                    <i class="fa fa-support fa-3x color-white"></i>
                   <h3 class="title">24/7 Support</h3>
                   <p>Our multilingual 24/7 support allows us to keep in touch with customers in all time zones and regions</p>
                </div>


                </div>
                <!-- end row -->

            </div> <!-- end container -->
        </section>
        <!-- end FEATURES -->


        <!-- Currencies -->
        <section class="section bg-lightgray" id="Currencies">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <p><span class="fa fa-money color-blue"></span> Avaible Currencies to Trade</p>
                            <h2 class="text-uppercase text-blue text-blue">Availble Currencies</h2>
                        </div>
                    </div>
                  </div>
                  <div class="row text-center">
                    <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
                         <a href="index.html" class="currencyLink">
                        <img class="w-80" src="{{URL::asset('tradify/images/logos/btc.png')}}" alt="btc">
                        </a>
                        <span class="label label-primary logoSpanClass">Bitcoin</span>
                    </div>

                    <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
                         <a href="index.html" class="currencyLink">
                        <img class="w-80" src="{{URL::asset('tradify/images/logos/ltc.png')}}" alt="ltc">
                        </a>
                        <span class="label label-primary logoSpanClass">Litecoin</span>
                    </div>

                    <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
                         <a href="index.html" class="currencyLink">
                        <img class="w-80" src="{{URL::asset('tradify/images/logos/eth.png')}}" alt="eth">
                        </a>
                        <span class="label label-primary logoSpanClass">Ethereum</span>
                    </div>

                    <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
                        <a href="index.html" class="currencyLink">
                        <img class="w-80" src="{{URL::asset('tradify/images/logos/usdt.png')}}" alt="usdt">
                        </a>
                        <span class="label label-primary logoSpanClass">USDT</span>

                    </div>

                    <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
                         <a href="index.html" class="currencyLink">
                        <img class="w-80" src="{{URL::asset('tradify/images/logos/eos.png')}}" alt="eos">
                        </a>
                        <span class="label label-primary logoSpanClass">Eos</span>
                    </div>

                    <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
                         <a href="index.html" class="currencyLink">
                        <img class="w-80" src="{{URL::asset('tradify/images/logos/stellar.png')}}" alt="eos">
                        </a>
                        <span class="label label-primary logoSpanClass">Stellar</span>
                    </div>

                    <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
                         <a href="index.html" class="currencyLink">
                        <img class="w-80" src="{{URL::asset('tradify/images/logos/trx.png')}}" alt="trx">
                        </a>
                        <span class="label label-primary logoSpanClass">Tron</span>
                    </div>



                    <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
                        <a href="index.html" class="currencyLink">
                        <img class="w-80" src="{{URL::asset('tradify/images/logos/ada.png')}}" alt="ada">
                        </a>
                        <span class="label label-primary logoSpanClass">Cardano</span>

                    </div>

                    <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
                         <a href="index.html" class="currencyLink">
                        <img class="w-80" src="{{URL::asset('tradify/images/logos/neo.png')}}" alt="trx">
                        </a>
                        <span class="label label-primary logoSpanClass">Neo</span>
                    </div>

                    <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
                         <a href="index.html" class="currencyLink">
                        <img class="w-80" src="{{URL::asset('tradify/images/logos/vechain.png')}}" alt="trx">
                        </a>
                        <span class="label label-primary logoSpanClass">Vechain</span>
                    </div>

                    <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
                         <a href="index.html" class="currencyLink">
                        <img class="w-80" src="{{URL::asset('tradify/images/logos/nano.png')}}" alt="trx">
                        </a>
                        <span class="label label-primary logoSpanClass">Nano</span>
                    </div>

                    <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
                         <a href="index.html" class="currencyLink">
                        <img class="w-80" src="{{URL::asset('tradify/images/logos/zencash.png')}}" alt="trx">
                        </a>
                        <span class="label label-primary logoSpanClass">Zencash</span>
                    </div>


                </div>
              </div>
            </div> <!-- end container -->
        </section>
        <!-- end Currencies -->




        <!-- FOOTER -->
        <footer class="bg-dark footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 col-sm-12">
                        <h4 class="logo">CRYEX</h4>
                        <p>The Best Crypto-Trading Engine Out There!</p>

                        <ul class="list-inline social">
                            <li>
                                <a href="javascript:void(0);" class="bg-twitter"><i class="ti-twitter-alt"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="bg-dribbble"><i class="ti-dribbble"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="bg-linkedin"><i class="ti-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="bg-googleplus"><i class="ti-google"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="bg-facebook"><i class="ti-facebook"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6 col-md-offset-2">
                        <h5>Solutions</h5>
                        <ul class="list-unstyled footer-list">
                           <li><a href="#">Fee Info</a></li>
                           <li><a href="#">Start Trading</a></li>
                           <li><a href="#">We are Hiring</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h5>Useful Links</h5>
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Help &amp; Support</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>

                </div> <!-- end row -->


            </div> <!-- end container -->
        </footer>
        <!-- end FOOTER -->


        <!-- COPYRIGHT -->
        <div class="footer-alt bg-dark">
            <p class="copy-rights">2018 © CRYEX. All Rights Reserved</p>
        </div>




        <script src="{{URL::asset('tradify/plugins/jquery/jquery.js')}}"></script>
        <script src="{{URL::asset('tradify/plugins/bootstrap/js/bootstrap.js')}}"></script>

        <!-- Sticky Header -->
        <script src="{{URL::asset('tradify/js/jquery.sticky.js')}}"></script>

        <!-- Jquery easing -->
        <script src="{{URL::asset('tradify/js/jquery.easing.1.4.1.js')}}"></script>

        <!-- Owl Carousel -->
        <script src="{{URL::asset('tradify/js/owl.carousel.min.js')}}"></script>

        <!-- Magnific Popup -->
        <script src="{{URL::asset('tradify/js/jquery.magnific-popup.js')}}"></script>

        <!-- Custom js -->
        <script src="{{URL::asset('tradify/js/landing.js')}}"></script>

        <script>
            jQuery(document).ready(function($) {
                $('.owl-carousel').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:false,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    responsive:{
                        0:{
                            items:1
                        }
                    }
                });

            });
        </script>

    </body>
</html>
