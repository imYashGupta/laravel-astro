<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset("src/user/css/style.css")}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="app-url" content="{{  $_SERVER['PHP_SELF'] }}">
    <title>Paathwayastro - Account</title>
    <style>
        input,select{
            border: 1px solid #999999 !important;
        }
        @media print {
        a{
            text-decoration: none !important;
            color: black !important;
        }
        .hide-print{
            display: none !important;
        }

}
    </style>
    @yield("styles")
    
  </head>
  <body class="pb-70">
    
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="/src/user/img/pathway_logo.png" alt="logo"></a>
          <div class="show-user-mobile">
              <a class="profile-icon-dropdown" data-toggle="collapse" href="#showprofiledw" role="button" aria-expanded="false" aria-controls="showprofiledw"><img src="src/user/img/user-profile.jpg" alt="user"/> {{auth()->user()->name}}</a>
                <div class="collapse" id="showprofiledw">
                    <ul class="m-0 p-0">
                        <li>
                            <a href="#">
                                <img src="src/user/img/draw.svg" alt="left-nav-icons">
                                Edit profile
                            </a>
                        </li>
                       <!--  <li>
                            <a href="#">
                                <img src="src/user/img/settings.svg" alt="left-nav-icons">
                                Settings
                            </a>
                        </li> -->
                        <li>
                            <a href="http://rmdfront.alcyone.in/sign_up.html">
                                <img src="/src/user/img/logout.svg" alt="left-nav-icons">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><img src="src/user/img/search.svg" alt="search-icon"/></button>
            </form> -->
            <ul class="navbar-nav ml-auto">
             `
              <!-- <li class="nav-item">
                <a class="nav-link" href="#"><img src="src/user/img/users.svg" alt="header-nav-icon"> Network</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><img src="src/user/img/chat.svg" alt="header-nav-icon"> Messaging</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><img src="src/user/img/notification.svg" alt="header-nav-icon"> Notifications</a>
              </li> -->
              <li class="nav-item">
                <a class="profile-icon-dropdown" data-toggle="collapse" href="#showprofiledw" role="button" aria-expanded="false" aria-controls="showprofiledw"><img src="{{auth()->user()->displayPictureUrl}}" alt="user"/> {{auth()->user()->name}}</a>
                <div class="collapse" id="showprofiledw">
                    <ul class="m-0 p-0">
                    	<li>
	                		<a href="user_profile.html">
                                <img src="/src/user/img/draw.svg" alt="left-nav-icons">
                                Edit profile
                            </a>
                    	</li>
                    	<!-- <li>
                    		<a href="#">
                                <img src="src/user/img/settings.svg" alt="left-nav-icons">
                                Settings
                            </a>
                    	</li> -->
                    	<li>
                    		<a href="../index.php">
                                <img src="/src/user/img/logout.svg" alt="left-nav-icons">
                                Logout
                            </a>
                    	</li>
                    </ul>
                </div>
              </li>
            </ul>
          </div>
      </div>
    </nav>

    <!-- Navbar Ends -->

    <!-- Main Dashbord Content -->

    <section class="main-dashboard mt-30" id="wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-xl-3 col-lg-3 col-md-12 d-print-none">
                  <div class="left-nav">
                      <ul class="p-0 m-0">
                          <li>
                              <a href="{{route("user.dashboard")}}" @if(in_array(\Request::route()->getName(),["user.dashboard"])) class="active" @endif >
                                  <img src="/src/user/img/home-2.svg" alt="left-nav-icons"/>
                                  Dashboard  
                              </a>
                          </li>
                          <li>
                              <a href="{{route("user.profile")}}" @if(in_array(\Request::route()->getName(),["user.profile","user.profile.edit","user.profile.password"])) class="active" @endif>
                                  <img src="/src/user/img/user2.svg" alt="left-nav-icons"/>
                                  My Profile
                              </a>
                          </li>
                           <li>
                              <a href="{{route("user.orders")}}" @if(in_array(\Request::route()->getName(),["user.orders","user.order"])) class="active" @endif>
                                  <img src="/src/user/img/order.svg" alt="left-nav-icons"/>
                                  My Orders
                              </a>
                          </li>
                         
                          <li>
                              <a href="user_appointment.html">
                                  <img src="/src/user/img/calender.svg" alt="left-nav-icons"/>
                                  My Appointments
                              </a>
                          </li>
                          <li>
                              <a href="{{route("tickets.index")}}">
                                  <img src="/src/user/img/chat2.svg" alt="left-nav-icons"/>
                                  My Ticket 
                              </a>
                          </li>
                          <li>
                              <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                                  <img src="/src/user/img/logout.svg" alt="left-nav-icons" style="width: 19px;height: 16px;">
                                  Logout 
                              </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form> 
                          </li>
                      </ul>
                    
                  </div>
              </div>
              @yield('content')
          </div>
      </div>
  </section> 

    <!-- Main Dashbord Content Ends-->

    <!-- Optional JavaScript; choose one of the two! -->

    <script src="{{ asset("js/app.js") }}"></script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
    @yield("scripts")
  </body>
</html>