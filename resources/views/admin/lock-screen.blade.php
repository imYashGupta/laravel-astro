@extends('layouts.master-without-nav')

@section('content')
      <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center m-0">
                        <a href="index" class="logo logo-admin"><img src="{{ URL::asset('assets/images/logo.png') }}" height="30" alt="logo"></a>
                    </h3>
                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Locked</h4>
                        <p class="text-muted text-center">Hello {{$user->firstname}}, enter your password to unlock the screen!</p>
                        <form class="form-horizontal m-t-30" action="index">
                            <div class="user-thumb text-center m-b-30">
                                <img src="{{ $user->displayPictureUrl }}" class="rounded-circle img-thumbnail" alt="thumbnail">
                                <h6>{{ $user->name }}</h6>
                            </div>
                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                            </div>
                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Unlock</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="m-t-40 text-center">
                <p class="text-white">Not you ? return <a href="pages-login" class="font-500 font-14 text-white font-secondary"> Sign In </a> </p>
                <p class="text-white">© {{ date("Y",strtotime("-1 year")) }} - {{date('Y')}} Admiria. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
            </div>
        </div>
@endsection

@section('script')

@endsection

