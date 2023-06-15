<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   <?php
   $uri = $_SERVER['REQUEST_URI'];
   if ($uri == '/' || $uri == '/index.php') {
   ?>
      <title>Post Free Classified Ads Online in Nepal - Dealmih</title>
      <meta name="description" content="Dealmih is one of the best classified sites in Nepal. You can post jobs, buy/sell or rent property, and vehicles online. Post your ads now!">
   <?php
   } elseif ($uri == '/property') {
   ?>
      <title>Real Estate for Rent | Sale and Rent Properties in Nepal | Dealmih</title>
      <meta name="description" content="Looking for an affordable real estate property for rent in Nepal? Post your free classified ads to buy, sell or rent the best residential, commercial space in Nepal.">
   <?php
   } elseif ($uri == '/motor') {
   ?>
      <title>Buy Vehicle in Affordable Price | List Your Vehicle for Sale in Kathmandu</title>
      <meta name="description" content="The best classified website to list your vehicle for sale In Kathmandu. Buy four-wheeler vehicle at affordable price in Nepal. Visit now!">
   <?php
   } elseif ($uri == '/jobs') {
   ?>
      <title>Jobs in Kathmandu - Post Jobs, Find Jobs, Vacancy in Nepal</title>
      <meta name="description" content="You can post and search job information for care takers, housekeeping and freshers. dealmih.com is Nepal's free job posting site online. Visit us now!">

   <?php
   } elseif ($uri == '/search/services?category%5B%5D=324') {
   ?>
      <title>Get Legals & Law Services in Kathmandu | Nepal</title>
      <meta name="description" content="Find the best legals & law services in Kathmandu. dealmih.com offers the best classified services online in Nepal. Visit now!">
   <?php
   } else {
   ?>
      <title>Dealmih</title>
   <?php } ?>

   @yield('css')
   @php
   $setting_model = new App\Models\Setting;
   $setting_data = $setting_model->getSettingData();
   @endphp
   @if($setting_data->favicon)
   <link rel="icon" href="{{url('public/media/faviconImg', $setting_data->favicon)}}">
   @else
   <link rel="icon" href="{{url('public/images/users/dealmih.png')}}">
   @endif
   <?php
   $uri = $_SERVER['REQUEST_URI'];

   if ($uri == '/' || $uri == '/index.php') {
   ?>
      <link rel="canonical" href="http://speedow.com/" />
   <?php
   } else {
   ?>
      <link rel="canonical" href="{{ url('/') }}<?php echo $uri; ?>" />
   <?php
   }
   ?>
   <meta name="google-site-verification" content="InKbq-eaJdFVhm5vQY7h6wLZMSUtCbTMekjszZEIXKs" />
   <link rel="stylesheet" href="{{url('public/website/fonts/flaticon/flaticon.css')}}">
   <link rel="stylesheet" href="{{url('public/website/fonts/font-awesome/fontawesome.css')}}">
   <link rel="stylesheet" href="{{url('public/website/css/vendor/slick.min.css')}}">
   <link rel="stylesheet" href="{{url('public/website/css/vendor/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{url('public/website/css/custom/main.css')}}">
   <link rel="stylesheet" href="{{url('public/website/css/custom/index.css')}}">
   <link rel="stylesheet" href="{{url('public/website/css/custom/user-form.css')}}">
   <link rel="stylesheet" href="{{url('public/website/css/custom/dashboard.css')}}">
   <link rel="stylesheet" href="{{url('public/website/css/custom/ad-details.css')}}">
   <link rel="stylesheet" href="{{url('public/website/css/custom/blog-details.css')}}">
   <link rel="stylesheet" href="{{url('public/website/css/vendor/emojionearea.min.css')}}">
   <link rel="stylesheet" href="{{url('public/website/css/custom/rangeSlider.css')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="{{url('public/website/css/notifications/Lobibox.min.css')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
   <!-- Google tag (gtag.js) -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-HCCBS00QJK"></script>
   <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
         dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'G-HCCBS00QJK');
   </script>
   <style>
      .badge-success {
         background-color: red;
      }
   </style>
</head>

<body>

   @php
   $lan = trans('global.signup') == 'साइन अप करं' ? true: false;
   // dd($lan);
   @endphp
   <header class="header-part bshadow">
      <div class="container">
         <div class="header-content">
            <div class="header-left">

               <a href="{{url('/')}}" class="header-logo">
                  @if($setting_data->site_logo)
                  <img src="{{url('public/media/websitelogo', $setting_data->site_logo)}}" class="po" alt="logo">
                  @else
                  <img src="{{url('public/website/images/logo.png')}}" class="po" alt="logo">
                  @endif
               </a>

               <button type="button" class="header-widget sidebar-btn visible-xs d-none"><i class="fa fa-bars"></i></button>

               <!-- <a href="user-form.html" class="header-widget header-user"><img src="images/user.png" alt="user"><span>join me</span></a>-->

               <!-- <button type="button" class="header-widget search-btn"><i class="fas fa-search"></i>  -->

               </button>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light mlm15 hidden-x">
               <div class="container">

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile_nav" aria-controls="mobile_nav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="mobile_nav">
                     <ul class="navbar-nav navbar-light">
                        <li class="nav-item"><a class="nav-link {{ (request()->is('motor')) ? 'active' : '' }}" href="{{url('motor')}}">
                              {{ trans('global.motor') }}
                              {{-- Motor  --}}
                           </a></li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('property')) ? 'active' : '' }}" href="{{url('property')}}">
                              {{ trans('global.property') }}
                           </a></li>

                        <li class="nav-item"><a class="nav-link {{ (request()->is('marketplace')) ? 'active' : '' }}" href="{{url('marketplace')}}">
                              {{ trans('global.marketplace') }}
                           </a></li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('jobs')) ? 'active' : '' }}" href="{{url('jobs')}}">
                              {{ trans('global.jobs') }}
                           </a></li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('auction')) ? 'active' : '' }}" href="{{url('auction')}}">
                              {{ trans('global.auction') }}
                           </a></li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('services')) ? 'active' : '' }}" href="{{url('services')}}">
                              {{ trans('global.services') }}
                           </a></li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('stores')) ? 'active' : '' }}" href="{{url('stores')}}">
                              {{ trans('global.store') }}
                           </a></li>
                     </ul>
                  </div>
               </div>
            </nav>
            <div class="header-right">

               <!---->
               <div class="mw">
                  <div class="the-container">
                     <div class="box">
                        <p class="fs14b">Free</p>
                     </div>
                  </div>
               </div>


               <!---->


               <a href="{{url('header-category')}}" class="btn btn-inline post-btn" id="create_btn1"><span>{{ trans('global.create_listing') }}</span></a>
               <ul class="header-list">
                  @if(Auth::check())
                  @if(Auth::user()->role_id == 1)
                  <li class="header-item hover_header">
                     <a href="{{ url('dashboard/home') }}" class="header-widget"><i class="fa fa-tachometer"></i>
                        <p class="fs14 mtm5">{{ trans('global.dashboard') }}</p>
                     </a>
                  </li>
                  @endif
                  <!--  <li class="header-item hover_header">
                            <a href="{{ url('profile') }}" class="header-widget"><i class="fa fa-user-o"></i>
                            <p class="fs14 mtm5">{{ trans('global.my_profile') }}</p></a>
                        </li> -->

                  <li class="header-item">
                     <button type="button" class="header-widget"><i class="fas fa-user"></i></button>
                     <div class="dropdown-card w315 p5" id="welcomePopup">
                        <div class="megmenu">
                           <p class="ffs16">{{ trans('global.welcome') }}<br><b>{{Auth::user()->username }}</p>

                           <p class="mfs14l mb10"></b></p>


                           <!--  <div class="mw">
                        <div class="the-container" style="height: 10px;">
                        <div class="box" style="position: relative;  width: auto; margin-left: -349px; margin-top: 6px; margin-bottom: 50px;padding: 0px 7px;
                        line-height: 27px; background-color: #fc7c55; color: #000; display: block; border-radius: 4px 4px 4px 0px;">
                          <p class="fs14b" style="font-size: 14px; color: #fff;">Free</p>
                        </div>
                        </div>
                        </div> -->
                           <!-- <a class="mbtn mb5" href="{{url('register')}}">{{ trans('global.register') }}</a>
                           <a class="mbtn ml15 mb5" href="{{url('login')}}">{{ trans('global.login') }}</a> -->
                           <!-- <img src="" alt="" width="100px"> -->
                        </div>
                        <ul class="notify-list userdash" style="margin-top: -10px;">

                           <li class="notify-item bt0">
                              <a href="/profile" class="notify-link">
                                 <p class="notify-text"> {{ trans('global.dashboard') }}</p>
                              </a>
                           </li>
                           <li class="notify-item bt0">
                              <a href="/contact" class="notify-link">
                                 <p class="notify-text"> {{ trans('global.contact_us') }}</p>
                              </a>
                           </li>
                           <li class="notify-item bt0">
                              <a href="/order" class="notify-link">
                                 <p class="notify-text"> {{ trans('global.orders') }}</p>
                              </a>
                           </li>

                        </ul>
                     </div>
                     <p class="fs14 mtm5"><a>{{ trans('global.my_profile') }}</a></p>
                  </li>
                  @else
                  <li class="header-item hover_profile">

                     @php
                     $margin='';
                     if ( $lan) {
                     $margin='margin-left: -210px;';
                     }
                     else {
                     $margin='margin-left: -175px;';
                     }
                     @endphp


                     <div class="mw">
                        <div class="the-container" style="height: 14px;">
                           <div class="box" style="
                                 position: relative; 
                                 width: auto; 
                                {{ $margin }}
                                 margin-top: 4px; 
                                 margin-bottom: 50px;
                                 padding: 0px 12px;
                                 line-height: 27px; 
                                 background-color: #fc7c55; 
                                 color: #000; 
                                 display: block; 
                                 border-radius: 4px 4px 4px 0px;
                                 z-index: 1;
                                 ">
                              <p class="fs14b" style="font-size: 14px; color: #fff !important;">Free</p>
                           </div>
                        </div>
                     </div>

                     <button type="button" class="header-widget btn-inline d-flex px-4" style="gap: 6px;border-radius: 8px;margin-top: -10px;">
                        <i class="fas fa-user w-auto" style="color: white !important; font-size: 12px; padding-top: 2px;"></i>
                        <p style="color: white !important; font-size: 14px;">{{ trans('global.signup') }}</p>
                     </button>
                     <div class="dropdown-card w315 p5" id="jPopup">
                        <div class="megmenu">
                           <p class="ffs16">{{ trans('global.welcome') }}</p>
                           <p class="mfs14l mb10">{{ trans('global.to_access_account_and_manage_orders') }}</p>
                           <div class="mw">
                              <div class="the-container" style="height: 14px;">
                                 <div class="box" style="position: relative;  width: auto; margin-left: -349px; margin-top: 6px; margin-bottom: 50px;padding: 0px 7px;
                                    line-height: 27px; background-color: #fc7c55; color: #000; display: block; border-radius: 4px 4px 4px 0px;">
                                    <p class="fs14b" style="font-size: 14px; color: #fff !important;">Free</p>
                                 </div>
                              </div>
                           </div>
                           <a class="mbtn mb5" href="{{url('register')}}">{{ trans('global.register') }}</a>
                           <a class="mbtn ml15 mb5" href="{{url('login')}}">{{ trans('global.login') }}</a>
                        </div>
                        <ul class="notify-list userdash">
                           <li class="notify-item">
                              <a href="/manage-ads" class="notify-link">
                                 <p class="notify-text"> {{ trans('global.manage_ads') }}</p>
                              </a>
                           </li>
                           <li class="notify-item bt0">
                              <a href="/contact" class="notify-link">
                                 <p class="notify-text"> {{ trans('global.contact_us') }}</p>
                              </a>
                           </li>
                           <li class="notify-item bt0">
                              <a href="/help" class="notify-link">
                                 <p class="notify-text"> {{ trans('global.help') }}</p>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </li>
                  @endif
                  @if(Auth::check())
                  <!-- <li class="header-item">
                        <a href="{{url('wishlist')}}" class="header-widget "><i class="fa fa-heart-o"></i></a>
                     <p class="fs14 mtm5">{{ trans('global.wishlist') }}</p>
                     </li> -->
                  <li class="header-item" id="hover_cart">
                     <a href="{{url('cart')}}" class="header-widget"><i class="fa fa-shopping-cart"></i></a>
                     <p class="fs14 mtm5">{{ trans('global.cart') }}</p>
                  </li>
                  @endif
                  {{-- <li class="header-item">
                     <select class="change-language"  style="background:transparent; color:#fff;border:none; font-size:13px; font-weight:bold; text-transform:uppercase;">
@if(\App\Models\Language::where('active', 1)->get())
                        @foreach (\App\Models\Language::where('active', 1)->get() as $language)
    <option style="background:#000;" value="{!! $language->code !!}"
        {!! \App::getLocale() == $language->code ? 'selected' : '' !!}>{!! $language->display_name !!}</option>
@endforeach
@endif
</select>
                   </li> --}}


                  <li>
                     <nav class="main-header navbar navbar-expand bg-white navbar-light">


                        <!-- Right navbar links -->
                        @if(count(config('panel.available_languages', [])) > 1)
                        <ul class="navbar-nav ml-auto">
                           <li class="nav-item dropdown mb0">
                              @if(strtoupper(app()->getLocale()) == 'EN')
                              <a class="nav-link" href="{{ url()->current() }}?change_language={{ 'ne' }}">
                                 <i class="fa fa-flag" aria-hidden="true"></i>
                                 <br>
                                 {{-- {{dd(app()->getLocale())}} --}}
                                 @php
                                 $lang = strtoupper(app()->getLocale());
                                 // dd($lang);
                                 if($lang == 'EN')
                                 {
                                 $changeLng = 'नेाली भाषा';
                                 }elseif ($lang == 'NE') {
                                 $changeLng = 'English';

                                 }
                                 @endphp

                                 {{ $changeLng}}
                                 {{-- {{ strtoupper(app()->getLocale()) }} --}}
                              </a>
                              @else
                              <a class="nav-link" href="{{ url()->current() }}?change_language={{ 'en' }}">
                                 <i class="fa fa-flag" aria-hidden="true"></i>
                                 <br>
                                 {{-- {{dd(app()->getLocale())}} --}}
                                 @php
                                 $lang = strtoupper(app()->getLocale());
                                 // dd($lang);
                                 if($lang == 'EN')
                                 {
                                 $changeLng = 'नेपाली भाषा';
                                 }elseif ($lang == 'NE') {
                                 $changeLng = 'English';

                                 }
                                 @endphp

                                 {{ $changeLng}}
                                 {{-- {{ strtoupper(app()->getLocale()) }} --}}
                              </a>

                              @endif
                              <!-- <div class="dropdown-menu dropdown-menu-right">
                      @foreach(config('panel.available_languages') as $langLocale => $langName)
                      
                          <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ 'en' }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                      @endforeach
                  </div> -->
                           </li>
                        </ul>
                        @endif

                     </nav>

                  </li>
                  {{-- <li class="header-item">
                        <a class="header-widget"><i class="fa fa-power-off font-size-16 align-middle me-1 text-danger"></i></a>
                        <p class="fs14 mtm5">Logout</p>
                        </li>  --}}



                  <!-- <li class="header-item">
                        <a role="button" class="header-widget" href="login.html"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                       
                     </li>  -->
               </ul>

            </div>
         </div>
      </div>
   </header>

   <!-- mobile popup
 -->
   <style>
      div#mobile_popup {
         display: none;
         position: absolute;
         top: 24%;
         left: 16px;
         z-index: 9;
         background: white;
         height: 280px;
         width: 90%;
         transform: translate(-50% -50%);
      }

      span.close_btn {
         position: absolute;
         top: 2px;
         right: 12px;
      }

      h4.text-pop {
         text-align: center;
         margin-top: 13px;
      }

      @media screen and (max-width: 480px) {
         div.show_popup {
            display: block !important;
         }
      }

      p.pop-text {
         font-size: 13px;
      }

      @media screen and (max-width: 320px) {
         .box {
            position: absolute;
            left: 37px !important;
            top: 92px !important;
         }
      }

      @media screen and (max-width: 480px) {
         .box {
            position: absolute;
            left: 37px !important;
            top: 50px !important;
         }

         .notify-link {
            padding: 12px 0px;
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
         }

      }

      .pop-set {
         margin-top: 13px;
      }

      @media(min-width: 768px) {
         .the-container .box {
            position: relative;
            width: auto;
            margin-left: -30px;
            margin-top: 20px;
            left: 45px;
            top: -15px;
            margin-bottom: 50px;
            padding: 0px 13px;
            line-height: 27px;
            background-color: #fc7c55;
            color: #000;
            display: block;
            border-radius: 4px 4px 4px 0px;
         }
      }
   </style>

   <script>
      function closeModel() {
         var element = document.getElementById('mobile_popup');
         element.classList.remove("show_popup");
      }
   </script>

   @if (Auth::check())
   <!--       <span onclick="closeModel()" class="close_btn"><b>X</b></span>
         <img src="{{url('/website/images/logo.png')}}" class="img-pop" alt="" width="200px" height="100px">
        <h4 class="text-pop">Welcome, <b>{{Auth::user()->username }}</b></h4>
          -->
   @else
   <div id="mobile_popup" class="shadow p-3 mb-5 bg-body rounded">
      <div class="content-inner">
         <span onclick="closeModel()" class="close_btn">X</span></b>
         <h4>Welcome</h4>
         <p class="pop-text">To access account and manage orders</p>
         <div class="pop-set">
            <div class="mw">
               <div class="the-container" style="height: 10px;">
                  <div class="box">
                     <p class="fs14b" style="font-size: 14px; color: #fff;">Free</p>
                  </div>
               </div>
            </div>
            <a class="mbtn mb5" href="{{url('register')}}">Register</a>
            <a class="mbtn ml15 mb5" href="{{url('login')}}">Login</a>
            <ul class="notify-list userdash">
               <li class="notify-item">
                  <a href="/manage-ads" class="notify-link">
                     <p class="notify-text"> {{ trans('global.manage_ads') }}</p>
                  </a>
               </li>
               <li class="notify-item bt0">
                  <a href="/contact" class="notify-link">
                     <p class="notify-text"> {{ trans('global.contact_us') }}</p>
                  </a>
               </li>
               <li class="notify-item bt0">
                  <a href="/order" class="notify-link">
                     <p class="notify-text"> {{ trans('global.orders') }}</p>
                  </a>
               </li>
            </ul>
            @endif
         </div>
      </div>
   </div>

   <!-- end mobilepopup -->
   @yield('content')





   <aside class="sidebar-part">
      <div class="sidebar-body">
         <div class="sidebar-header"><a href="{{ url('/') }}" class="sidebar-logo"><img src="{{ url('public/website/images/logo.png') }}" alt="logo"></a><button class="sidebar-cross"><i class="fas fa-times"></i></button></div>
         <div class="sidebar-content">

            <div class="sidebar-menu">
               <ul class="nav nav-tabs">

                  <!---mobile language----->
                  <li>
                     <nav class="main-header navbar navbar-expand bg-white navbar-light mnav">


                        <!-- Right navbar links -->
                        @if(count(config('panel.available_languages', [])) > 1)
                        <ul class="navbar-nav ml-auto">
                           <li class="nav-item dropdown mb0">
                              @if(strtoupper(app()->getLocale()) == 'EN')
                              <a class="nav-link" href="{{ url()->current() }}?change_language={{ 'ne' }}">
                                 <i class="fa fa-flag" aria-hidden="true"></i>
                                 <br>
                                 {{-- {{dd(app()->getLocale())}} --}}
                                 @php
                                 $lang = strtoupper(app()->getLocale());
                                 // dd($lang);
                                 if($lang == 'EN')
                                 {
                                 $changeLng = 'नेपाली ाषा';
                                 }elseif ($lang == 'NE') {
                                 $changeLng = 'English';

                                 }
                                 @endphp

                                 {{ $changeLng}}
                                 {{-- {{ strtoupper(app()->getLocale()) }} --}}
                              </a>
                              @else
                              <a class="nav-link" href="{{ url()->current() }}?change_language={{ 'en' }}">
                                 <i class="fa fa-flag" aria-hidden="true"></i>
                                 <br>
                                 {{-- {{dd(app()->getLocale())}} --}}
                                 @php
                                 $lang = strtoupper(app()->getLocale());
                                 // dd($lang);
                                 if($lang == 'EN')
                                 {
                                 $changeLng = 'ेपाली भाषा';
                                 }elseif ($lang == 'NE') {
                                 $changeLng = 'English';

                                 }
                                 @endphp

                                 {{ $changeLng}}
                                 {{-- {{ strtoupper(app()->getLocale()) }} --}}
                              </a>

                              @endif
                              <!-- <div class="dropdown-menu dropdown-menu-right">
                      @foreach(config('panel.available_languages') as $langLocale => $langName)
                      
                          <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ 'en' }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                      @endforeach
                  </div> -->
                           </li>
                        </ul>
                        @endif

                     </nav>

                  </li>
                  <!---mobile language----->
                  <li><a href="#main-menu" class="nav-link active" data-toggle="tab">All Categories</a></li>
                  @if(Auth::check())
                  <li><a href="#author-menu" class="nav-link" data-toggle="tab">My Dashboard</a></li>
                  @else
                  <li> <a class="nav-link" style="color:#555555;" href="{{ url('profile') }}">Login / Register</a> </li>
                  @endif
               </ul>
               <div class="tab-pane active" id="main-menu">
                  <ul class="navbar-list">
                     <li class="notify-item"><a class="nav-link {{ (request()->is('motor')) ? 'active' : '' }} navpadxs" href="{{url('motor')}}"><i class="fa fa-motorcycle mr10"></i> Motor <i class="fa fa-angle-right fright" aria-hidden="true"></i></a></li>
                     <li class="notify-item"><a class="nav-link {{ (request()->is('property')) ? 'active' : '' }} navpadxs" href="{{url('property')}}"><i class="fa fa-building-o mr10"></i> Property <i class="fa fa-angle-right fright" aria-hidden="true"></i></a></li>

                     <li class="notify-item"><a class="nav-link {{ (request()->is('marketplace')) ? 'active' : '' }} navpadxs" href="{{url('marketplace')}}"><i class="fa fa-shopping-cart mr10"></i> Marketplace <i class="fa fa-angle-right fright" aria-hidden="true"></i></a></li>
                     <li class="notify-item"><a class="nav-link {{ (request()->is('jobs')) ? 'active' : '' }} navpadxs" href="{{url('jobs')}}"><i class="fa fa-search mr10"></i> Jobs <i class="fa fa-angle-right fright" aria-hidden="true"></i></a></li>
                     <li class="notify-item"><a class="nav-link {{ (request()->is('auction')) ? 'active' : '' }} navpadxs" href="{{url('auction')}}"><i class="fa fa-tags mr10"></i> Auction <i class="fa fa-angle-right fright" aria-hidden="true"></i></a></li>
                     <li class="notify-item"><a class="nav-link {{ (request()->is('services')) ? 'active' : '' }} navpadxs" href="{{url('services')}}"><i class="fa fa-cogs mr10"></i> Services <i class="fa fa-angle-right fright" aria-hidden="true"></i></a></li>
                     <li class="notify-item"><a class="nav-link {{ (request()->is('stores')) ? 'active' : '' }} navpadxs" href="{{url('stores')}}"><i class="fa fa-university mr10"></i> Store <i class="fa fa-angle-right fright" aria-hidden="true"></i></a></li>
                     @if(Auth::check())
                     <li class="notify-item">
                        <div align="center">
                           <a href="{{url('logout')}}" class="btn btn-inline3 post-btn"><span class="cred">LOG OUT</span></a>
                        </div>

                     </li>
                     @endif
                  </ul>
               </div>
               <div class="tab-pane" id="author-menu">
                  <ul class="navbar-list">
                     @if(Auth::check())

                     <li class="notify-item {{ (request()->is('profile')) ? 'active' : '' }}">
                        <a href="{{ url('profile') }}" class="notify-link">
                           <p><i class="fa fa-user mr10"></i>&nbsp; My Profile <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>

                        </a>
                     </li>



                     <!-- <li class="header-item p10">
                         <a href="{{ url('profile') }}" class="header-widget"> <p class="fs14 mtm5">My Profile</p></a>
                        
                     </li> -->
                     @else
                     <li class="header-item">
                        <button type="button" class="header-widget"></button>
                        <div class="dropdown-card w315 p5">
                           <div class="megmenu">
                              <p class="ffs16">Welcome</p>
                              <p class="mfs14l mb10">To access account and manage orders</p>
                              <a class="mbtn mb5" href="{{url('register')}}">Register</a>
                              <a class="mbtn ml15 mb5" href="{{url('login')}}">Login</a>
                           </div>
                           <!-- <ul class="notify-list userdash">
                             <li class="notify-item">
                                <a href="#" class="notify-link">
                                 <p class="notify-text"> Manage Ads</p>
                               </a>
                             </li>
                             <li class="notify-item bt0">
                               <a href="#" class="notify-link">
                                <p class="notify-text"> Contact Us</p>
                              </a>
                            </li>
                            <li class="notify-item bt0">
                               <a href="#" class="notify-link">
                                <p class="notify-text"> Orders</p>
                              </a>
                            </li>
                          </ul> -->
                        </div>
                        <p class="fs14 mtm5 p10"><a style="color:#555555;" href="{{ url('profile') }}">Login</a></p>
                     </li>
                     @endif
                     @if(Auth::check())

                     <li class="notify-item {{ (request()->is('payment-method')) ? 'active' : '' }}">
                        <a href="{{url('payment-method')}}" class="notify-link">
                           <p><i class="fa fa-briefcase mr10"></i>&nbsp; Payment Method <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>

                        </a>
                     </li>

                     <li class="notify-item {{ (request()->is('order')) ? 'active' : '' }}">
                        <a href="{{url('order')}}" class="notify-link ">
                           <p><i class="fa fa-shopping-bag mr10 "></i>&nbsp; My Orders <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>

                        </a>
                     </li>

                     <li class="notify-item {{ (request()->is('wishlist')) ? 'active' : '' }}">
                        <a href="{{url('wishlist')}}" class="notify-link">
                           <p><i class="fa fa-heart mr10"></i>&nbsp; My Wishlist <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>

                        </a>
                     </li>

                     <li class="notify-item {{ (request()->is('manage-ads')) ? 'active' : '' }}">
                        <a href="{{url('manage-ads')}}" class="notify-link">
                           <p><i class="fa fa-download mr10"></i>&nbsp; Manage Ads <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>

                        </a>
                     </li>

                     <li class="notify-item {{ (request()->is('messages')) ? 'active' : '' }}">
                        <a href="{{url('messages')}}" class="notify-link">
                           <p><i class="fa fa-envelope mr10"></i>&nbsp; My Messages <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>

                        </a>
                     </li>

                     <li class="notify-item {{ (request()->is('notification')) ? 'active' : '' }}">
                        <a href="{{url('notification')}}" class="notify-link">
                           <p><i class="fa fa-bell mr10"></i>&nbsp; Notifications <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>

                        </a>
                     </li>

                     <li class="notify-item {{ (request()->is('interested-category')) ? 'active' : '' }}">
                        <a href="{{url('interested-category')}}" class="notify-link">
                           <p><i class="fa fa-tasks mr10"></i>&nbsp; Interested Categories <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>

                        </a>
                     </li>

                     <li class="notify-item {{ (request()->is('address')) ? 'active' : '' }}">
                        <a href="{{url('address')}}" class="notify-link">
                           <p><i class="fa fa-home mr10"></i>&nbsp; Address <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>

                        </a>
                     </li>

                     <li class="notify-item {{ (request()->is('job-profile')) ? 'active' : '' }}">
                        <a href="{{url('job-profile')}}" class="notify-link">
                           <p><i class="fa fa-user mr10"></i>&nbsp; Job Profile <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>

                        </a>
                     </li>

                     <li class="notify-item">
                        <div align="center">
                           <a href="{{url('logout')}}" class="btn btn-inline3 post-btn"><span class="cred">LOG OUT</span></a>
                        </div>

                     </li>



                     {{-- <li class="header-item">
                        <a href="{{url('wishlist')}}" class="header-widget "> <p class="fs14 mtm5 p10">Wishlist</p></a>

                     </li>--}}

                     {{-- <li class="header-item">
                     <a href="{{url('cart')}}" class="header-widget "> <p class="fs14 mtm5 p10">Cart</p></a>

                     </li> --}}


                     {{-- <li class="header-item">
                        <a class="header-widget"><i class="fa fa-power-off font-size-16 align-middle me-1 text-danger"></i></a>
                        <p class="fs14 mtm5">Logout</p>
                        </li>  --}}
                     @endif

                  </ul>
               </div>
            </div>
            <div class="sidebar-footer">


               <p>All Rights Reserved | Copyright @ 2022</p>
               <p> <a href="#!"> EETHAS Groups Pvt.Ltd</a></p>
            </div>
         </div>
      </div>
   </aside>
   <nav class="mobile-nav">
      <div class="container">
         <div class="mobile-group">
            <a href="{{ url('/') }}" class="mobile-widget"><i class="fas fa-home"></i><span>home</span></a>

            <a href="{{url('messages')}}" class="mobile-widget"><i class="fa fa-envelope"></i><span>Messages</span></a>



            <a href="{{url('header-category')}}" class="mobile-widget plus-btn"><span style="color:white" class="badge badge-pill badge-success">It's Free</span><i class="fas fa-plus"></i><span>Post <br>an ad</span></a>



            <a href="{{url('wishlist')}}" class="mobile-widget"><i class="fa fa-heart"></i><span>Wishlist</span></a>

            @if(Auth::check())
            <a href="{{url('profile')}}" id="welcomePopup" class="mobile-widget"><i class="fa fa-user"></i><span>My profile</span></a>
            @else
            <a href="{{url('profile')}}" id="welcomePopup" class="mobile-widget"><i class="fa fa-user"></i><span>Sign Up</span></a>
            @endif



         </div>
      </div>
   </nav>

   <div class="modal fade" id="login">
      <div class="modal-dialog modal-dialog-centered modal-md">
         <div class="modal-content">

            <div class="modal-body" align="center">
               <div class="user-form-title">
                  <h2>Login</h2>
                  <p class="mbm20">Enter your login details below.</p>

               </div>
               <form class="loginSubmit" data-content="login">
                  <div class="col-12">
                     <input type="hidden" value="1" name="type">
                     <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email ">
                        <span class="error" style="color: red;"></span>
                        <small class="form-alert">Please follow this example - 01XXXXXXXXX</small>
                     </div>

                  </div>
                  <div class="col-12">
                     <div class="form-group"><input type="password" class="form-control" name="password" id="pass" placeholder="Password">
                        <span class="error" style="color: red;"></span>

                        <button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button><small class="form-alert">Password must be 6 characters</small>
                     </div>

                  </div>
                  <div class="col-12">
                     <div class="form-group"><button type="submit" class="btn btn-inline"><span>Login</span></button></div>
                  </div>
               </form>
               <div class="user-form-direction">
                  <p>Or Sign in Via Social Account</p>
               </div>
               <ul class="user-form-option">
                  <li><a href="{{url('auth/google')}}"><img src="{{url('public/website/images/ui.svg')}}"><span> Sign in With Google</span></a></li>
                  <li><a href="{{url('auth/facebook')}}"><i class="fa fa-facebook"></i><span>Sign in With Facebook</span></a></li>
               </ul>
               <div class="user-form-direction">
                  <p>Don't have an account yet? <a href="{{url('register')}}"><u>Register Now</u> </a></p>
               </div>
            </div>
         </div>
      </div>
   </div>

   @include('website.layout.footer')

   {{-- login popup  --}}

   <div class="modal fade" id="help">
      <div class="modal-dialog modal-dialog-centered modal-md">
         <div class="modal-content">

            <div class="modal-body" align="center">
               <h4 class="mfs242">Need Help?</h4>
               <p class="mfs14l2">We are here to assist you! For any support and query<br>
                  please email us on the email I’d given below.</p>

               <a href="mailto:https://www.gmail.com" class="hrf mb20">support@dealmih.com</a>

               <div class="col-md-12"><a target="_blank" href="mailto:https://www.gmail.com" class="btn btn-inline post-btn2 fs18w w100 mb20"><span>Email Us</span></a></div>
            </div>
         </div>
      </div>
   </div>

   <script>
      $(document).ready(function() {
         if (window.location.href == 'https://dealmih.com/') {
            // $('#welcomePopup').show();
            // $('#mobile_popup').css("display", "block");
            $('#mobile_popup').addClass('show_popup');
         }
         var isshow = localStorage.getItem('isshow');
         if (isshow == null) {
            localStorage.setItem('isshow', 1);

            // Show popup here
            $('#jPopup').show();
         }

         $(window).scroll(function() {
            $('#mobile_popup').removeClass('show_popup');
         });
      });
   </script>

   <script>
      $(document).ready(function() {
         var isshow = localStorage.getItem('popState');
         if (isshow == null) {
            localStorage.setItem('popState', 1);

            // Show popup here
            $('#welcomePopup').show();
         }
      });
   </script>