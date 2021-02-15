<!-- Top Bar Start -->
<div class="topbar">

<nav class="navbar-custom">
    <!-- Search input -->
    <div class="search-wrap" id="search-wrap">
        <div class="search-bar">
            <input class="search-input" type="search" placeholder="Search" />
            <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                <i class="mdi mdi-close-circle"></i>
            </a>
        </div>
    </div>

    <ul class="list-inline float-right mb-0">
        <!-- Search -->
        {{-- <li class="list-inline-item dropdown notification-list">
            <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">
                <i class="mdi mdi-magnify noti-icon"></i>
            </a>
        </li> --}}
        <!-- Fullscreen -->
        <li class="list-inline-item dropdown notification-list hidden-xs-down">
            <a class="nav-link waves-effect" href="/" target="_blank" >
                <i class="mdi mdi-open-in-new noti-icon"></i>
            </a>
        </li>
        <li class="list-inline-item dropdown notification-list hidden-xs-down">
            <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                <i class="mdi mdi-fullscreen noti-icon"></i>
            </a>
        </li>
        <!-- language-->
        {{-- <li class="list-inline-item dropdown notification-list hidden-xs-down">
            <a class="nav-link dropdown-toggle arrow-none waves-effect text-muted" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                English <img src="{{ URL::asset('assets/images/flags/us_flag.jpg') }}" class="ml-2" height="16" alt=""/>
            </a>
            <div class="dropdown-menu dropdown-menu-right language-switch">
                <a class="dropdown-item" href="#"><img src="{{ URL::asset('assets/images/flags/germany_flag.jpg') }}" alt="" height="16"/><span> German </span></a>
                <a class="dropdown-item" href="#"><img src="{{ URL::asset('assets/images/flags/italy_flag.jpg') }}" alt="" height="16"/><span> Italian </span></a>
                <a class="dropdown-item" href="#"><img src="{{ URL::asset('assets/images/flags/french_flag.jpg') }}" alt="" height="16"/><span> French </span></a>
                <a class="dropdown-item" href="#"><img src="{{ URL::asset('assets/images/flags/spain_flag.jpg') }}" alt="" height="16"/><span> Spanish </span></a>
                <a class="dropdown-item" href="#"><img src="{{ URL::asset('assets/images/flags/russia_flag.jpg') }}" alt="" height="16"/><span> Russian </span></a>
            </div>
        </li> --}}
        <!-- notification-->
        <li class="list-inline-item dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <i class="ion-ios7-bell noti-icon"></i>
                @if($unseen->count() > 0) <span class="badge badge-danger noti-icon-badge">{{$unseen->count()}}</span> @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5>Notification  @if($unseen->count() > 0) ({{$unseen->count()}}) @endif</h5>
                </div>
                <!-- item-->
                @foreach ($notifications as $notification)
                <a href="{{ route("notification.redirect",$notification->id) }}" class="dropdown-item notify-item {{!$notification->seen ? 'active' : ''}}">
                    <div class="notify-icon {{$notification->info['bg']}}"><i class="mdi {{$notification->info['icon']}}"></i></div>
                    <p class="notify-details"><b>{{$notification->title}}</b><small class="text-muted">{{$notification->message}}</small></p>
                </a>
                @if($loop->iteration == 3)
                @break
                @endif
                @endforeach
                <!-- All-->
                <a href="{{route("notification.index")}}" class="dropdown-item notify-item">
                    View All
                </a>
            </div>
        </li>
        <!-- User-->
        <li class="list-inline-item dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <img src="{{ auth()->user()->displayPictureUrl }}" alt="user" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <a class="dropdown-item" href="{{ route("users.edit",1) }}"><i class="dripicons-user text-muted"></i> Profile</a>
                <a class="dropdown-item" href="{{route("settings")}}"> <i class="dripicons-gear text-muted"></i> Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="dripicons-exit text-muted"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>            </div>
        </li>
    </ul>
    <!-- Page title -->
    <ul class="list-inline menu-left mb-0">
        <li class="list-inline-item">
            <button type="button" class="button-menu-mobile open-left waves-effect">
                <i class="ion-navicon"></i>
            </button>
        </li>
        <li class="hide-phone list-inline-item app-search">
            @yield('breadcrumb') 
        </li>
    </ul>
    <div class="clearfix"></div>
</nav>
</div>
<!-- Top Bar End -->