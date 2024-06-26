<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('dashboard/assets/') }}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>@yield('page_title')</title>

    <meta name="description" content="" />
    
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard/assets/') }}img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <script src="{{ asset('dashboard/assets/vendor/js/helpers.js') }}"></script>

    <script src="{{ asset('dashboard/assets/js/config.js') }}"></script>


   
  </head>

  <body>
   
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              
              <span class="app-brand-text demo menu-text fw-bolder ms-2">BeautyBloom</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="{{route('admindashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Category</span>
            </li>
            <li class="menu-item">
              <a href="{{route('addcategory')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Add category</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{route('allcategory')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">All category</div>
              </a>
            </li>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text"> Sub Category</span>
            </li>
            <li class="menu-item">
              <a href="{{route('addsubcategory')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Add Subcategory</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{route('allsubcategory')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">All Subcategory</div>
              </a>
            </li>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Product</span>
            </li>
            <li class="menu-item">
              <a href="{{route('addproduct')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Add Product</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{route('allproducts')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">All Product</div>
              </a>
            </li>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Orders</span>
            </li>
            <li class="menu-item">
              <a href="{{route('pendingorder')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Pending Orders</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{route('Home')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Home</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{route('logout')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Logout</div>
              </a>
            </li>
            <!-- <li class="menu-item">
              <a href="{{route('admindashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Completed Orders</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{route('admindashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Cancel Orders</div>
              </a>
            </li> -->
            
          </ul>
        </aside>
        <!-- / Menu -->

        
        <div class="layout-page">

          
           <div class="content-wrapper">
                @yield('content')
           </div>
         
        </div>
        
      </div>

     
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
      const menuToggle = document.querySelector('.layout-menu-toggle');
      const layoutMenu = document.querySelector('.layout-menu');

      menuToggle.addEventListener('click', function () {
      layoutMenu.classList.toggle('menu-open');
      });
    });

    </script>
   

    <script src="{{ asset('dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('dashboard/assets/vendor/js/menu.js') }}"></script>
   

    
    <script src="{{ asset('dashboard/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <script src="{{ asset('dashboard/assets/js/main.js') }}"></script>

    
    <script src="{{ asset('dashboard/assets/js/dashboards-analytics.js') }}"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
