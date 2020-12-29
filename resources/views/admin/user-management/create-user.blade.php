@extends('layouts.master')

@section('css')
<!-- Select 2 -->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">User Management</h1>
@endsection

@section('content')
            <div class="page-content-wrapper">
                        <div class="container-fluid">
                            @include('components.alert')

                            <div class="row">
                                <div class="col-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">{{ $user ? 'Update' : 'Create New'}} User</h4>
                                            <p class="text-muted m-b-30 font-14">Fill the information below</p>

                                        <form action="{{ $user ? route("users.update",$user) : route("users.store")  }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="name">First Name</label>
                                                            <input  value="{{ $user ? $user->firstname : old("firstname")}}"  id="firstname" name="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror">
                                                            @error('firstname')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="lastname">Last Name</label>
                                                            <input    value="{{ $user ? $user->lastname : old("lastname")}}"  id="lastname" name="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror">
                                                            @error('lastname')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input   value="{{ $user ? $user->email : old("email")}}"   id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror">
                                                            @error('email')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="phone">Phone Number </label> 
                                                            <input  value="{{ $user ? $user->phone : old("phone")}}" id="phone" name="phone" type="text" class="form-control @error('phone') is-invalid @enderror">
                                                            @error('phone')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    @if($user)
                                                    <div class="col-sm-6" >
                                                        <div class="form-group" v-if="editPassword">
                                                            <label for="password">Password</label> <a href="javascript: void(0);" onclick="generatePassword()">Genrate new password</a>
                                                            <a @click.prevent="showPassword()" class="float-right text-danger" href="#" >Cancel</a>

                                                            <input  value="{{ old("password")}}"   id="password" name="password" type="text" class="form-control @error('password') is-invalid @enderror">
                                                           
                                                        </div>
                                                        <div v-else>
                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <a @click.prevent="showPassword()" class="float-right" href="#" >Update password</a>
                                                                <input disabled value="{{ old("password")}}" id="password" name="password" type="text" class="form-control @error('password') is-invalid @enderror">
                                                                @error('password')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="_method" value="PATCH">

                                                    @else
                                                    <div class="col-sm-6" >
                                                        <div class="form-group" >
                                                            <label for="password">Password</label> <a href="javascript: void(0);" onclick="generatePassword()">Genrate new password</a>

                                                            <input  value="{{ old("password")}}"   id="password" name="password" type="text" class="form-control @error('password') is-invalid @enderror">
                                                           
                                                        </div>
                                                         
                                                    </div>
                                                    @endif
                                                    <user-country-state data-countries="{{ $countries }}" @if($user) country="{{ $user->country }}" state="{{ $user->state }}" city="{{ $user->city }}" @endif ></user-country-state>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            <label for="address">Address </label> 
                                                            <input  value="{{ $user ? $user->address : old("address")}}" id="address" name="address" type="text" class="form-control @error('address') is-invalid @enderror">
                                                            @error('address')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="pincode">Pincode </label> 
                                                            <input  value="{{ $user ? $user->pincode : old("pincode")}}" id="pincode" name="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror">
                                                            @error('pincode')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="image">Profile Image </label> 
                                                            <input    id="image" name="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror">
                                                            @error('profile_image')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                         <img class=" img-thumbnail" id="preview-image" width="150" src="{{ $user && !is_null($user->display_image) ? $user->displayPictureUrl : asset("assets/images/placeholder/370-320.png") }}" />
                                                    </div>
                                                    @if($user===false)
                                                    <div class="col-sm-12 mb-3">
                                                        <div class="form-check">
                                                            <input name="is_notify" type="checkbox" class="form-check-input" id="is_notify">
                                                            <label class="form-check-label" for="is_notify">Send the new user an email about their account.
                                                            </label>
                                                          </div>   
                                                    </div>
                                                    @endif
                                                    @if($user)
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="status">Status</label> 
                                                            <select name="status" class="form-control @error('status') is-invalid @enderror"> 
                                                                <option {{ $user->status==1 ? "selected" : '' }} value="1">Active</option>
                                                                <option {{ $user->status==0 ? "selected" : '' }} value="0">Deactivate</option>
                                                        	</select>
                                                            @error('status')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- container -->
                    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
<!-- select2 js -->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>


@endsection

@section('script-bottom')
<script type="text/javascript">
    // Select2
    $(".select2").select2();
    function generatePassword() {
        var length = 12,
            charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&abcdefghijklmnopqrstuvwxyz",
            retVal = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        $("#password").val(retVal);
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            $('#preview-image').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $("#image").change(function() {
        console.log("logs")
        readURL(this);
    });
    
</script>

@endsection