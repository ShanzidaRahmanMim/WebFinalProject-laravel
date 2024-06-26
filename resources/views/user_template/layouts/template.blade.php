@php
$categories=App\Models\Category::latest()->get();
@endphp
<!DOCTYPE html>
<html lang="en">
   <head>
      
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      
      <title>Beauty Bloom</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('home/css/responsive.css')}}">
      <link rel="icon" href="{{asset('home/images/fevicon.png')}}" type="image/gif" />
      <link rel="stylesheet" href="{{asset('home/css/jquery.mCustomScrollbar.min.css')}}">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}">
      <link rel="stylesoeet" href="{{asset('home/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main">
         
         <div class="container">
            <!-- <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           
                           <li><a href="#">Best Sellers</a></li>
                           <li><a href="">Gift Ideas</a></li>
                           <li><a href="{{route('newrelease')}}">New Releases</a></li>
                           <li><a href="{{route('todaysdeal')}}">Today's Deals</a></li>
                           <li><a href="{{route('customerservice')}}">Customer Service</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div> -->
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo">
                        <!-- <a href="index.html">
                        <img src="{{asset('home/images/logo.jpg')}}"></a> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="{{route('Home')}}">Home</a>
                          
                            @foreach($categories as $category)
                            <a href="{{route('category',[$category->id,$category->slug])}}">{{$category->category_name}}</a>
                            @endforeach
                     
                     
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="{{asset('home/images/toggle-icon.png')}}" width="55px"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                       @foreach($categories as $category)
                       <a class="dropdown-item" href="{{route('category',[$category->id,$category->slug])}}">{{$category->category_name}}</a>
                       @endforeach
                       
                     </div>
                  </div>
                  <div class="main">
                     
                     <div class="input-group">
                     <form action="{{ route('search') }}" method="GET" class="form-inline w-100">
                <input type="text" name="query" class="form-control" placeholder="Search products" value="{{ request('query') }}" style="flex: 1;">
                  <div class="input-group-append">
                  <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522">
                  <i class="fa fa-search"></i>
                  </button>
                  </div>
                     </form>
                     </div>
                  </div>
                  <div class="header_box">
                     <div class="lang_box ">
                        
                     </div>
                     <div class="login_menu">
                        <ul>
                           <li><a href="{{route('userprofile')}}">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                           <li><a href="{{route('login')}}">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">Login</span></a>
                           </li>
                           <li><a href="{{route('registration')}}">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">Register</span></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favourite shopping</h1>
                              <!-- <div class="buynow_bt"><a href="#">Buy Now</a></div> -->
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Make your <br>look more gorgeous</h1>
                             
                              <!-- <div class="buynow_bt"><a href="#">Buy Now</a></div> -->
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favourite shopping</h1>
                              <!-- <div class="buynow_bt"><a href="#">Buy Now</a></div> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
        
      </div>
      <!-- banner bg main end -->
      <div class="container py-5" style="margin-top:200px;" >
        @yield('main-content')
      </div>


      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href=""><img src="{{asset('home/images/footer-logo.jpg')}}"></a></div>
            <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
               <!-- <ul>
                  <li><a href="#">Best Sellers</a></li>
                  <li><a href="#">Gift Ideas</a></li>
                  <li><a href="#">New Releases</a></li>
                  <li><a href="#">Today's Deals</a></li>
                  <li><a href="#">Customer Service</a></li>
               </ul> -->
            </div>
            <div class="location_main">Help Line  Number : <a href="#">01721459876</a></div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© All Rights Reserved by Mim</a></p>
         </div>
      </div>
      <!-- Javascript files-->
      <script src="{{asset('home/js/jquery.min.js')}}"></script>
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      <script src="{{asset('home/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('home/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('home/js/plugin.js')}}"></script>
      <!-- sidebar-->
      <script src="{{asset('home/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('home/js/custom.js')}}"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script>
   </body>
</html> 