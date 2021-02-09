@extends("layouts.user")
@section("content")
<div class="col-xl-9 col-lg-9 col-md-12">
                    <div class="main-center-data">
                        <h3 class="display-username">Edit Profile</h3>
                        <div class="informative-block bg-white round-crn pd-20-30 mt-15 hover-effect-box">
                            <form action="{{ route("user.profile.info") }}" method="POST">
                                @csrf
                                <h4 class="font-weight-bold mb-4">User Info</h4>
                                <div class="form-group row">
                                    <label for="firstname-text-input" class="col-sm-2 col-form-label label-mute">Firstname</label>
                                    <div class="col-sm-6">
                                        <input name="firstname" class="form-control   @error('firstname') is-invalid @enderror" type="text" value="{{auth()->user()->firstname}}" id="firstname-text-input">
                                        @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname-text-input" class="col-sm-2 col-form-label label-mute">Lastname</label>
                                    <div class="col-sm-6">
                                        <input  name="lastname" class="form-control  @error('lastname') is-invalid @enderror" type="text" value="{{auth()->user()->lastname}}" id="lastname-text-input">
                                        @error('lastname')
                                        <span class="invalid-feedback  " role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email-text-input" class="col-sm-2 col-form-label label-mute">Email</label>
                                    <div class="col-sm-6">
                                        <input  class="form-control" disabled type="text" value="{{auth()->user()->email}}" id="email-text-input">
                                         
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone-text-input" class="col-sm-2 col-form-label label-mute">Phone</label>
                                    <div class="col-sm-6">
                                        <input  name="phone" class="form-control  @error('phone') is-invalid @enderror" type="text" value="{{auth()->user()->phone}}" id="phone-text-input">
                                        @error('phone')
                                        <span class="invalid-feedback  " role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        <div class="informative-block bg-white round-crn pd-20-30 mt-15 hover-effect-box">
                            <h4 class="font-weight-bold mb-4">Address Info</h4>
                            <form   method="POST" action="{{ route("user.profile.address") }}">
                                @csrf
                            <profile-country-state 
                                @error('country') country-error="{{$message}}" @enderror
                                @error('state') state-error="{{$message}}" @enderror
                                @error('city') city-error="{{$message}}" @enderror
                                data-countries="{{ $countries }}" country="{{ auth()->user()->country }}" state="{{ auth()->user()->state }}" city="{{ auth()->user()->city }}" ></profile-country-state>
                            <div class="form-group row">
                                <label for="address-text-input" class="col-sm-2 col-form-label label-mute">Address</label>
                                <div class="col-sm-6">
                                    <input name="address" class="form-control @error('address') is-invalid @enderror" type="text" value="{{auth()->user()->address}}" id="address-text-input">
                                    @error('address')
                                        <span class="invalid-feedback  " role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pincode-text-input" class="col-sm-2 col-form-label label-mute">Pincode</label>
                                <div class="col-sm-6">
                                    <input name="pincode" class="form-control @error('pincode') is-invalid @enderror" type="text" value="{{auth()->user()->pincode}}" id="pincode-text-input">
                                    @error('pincode')
                                        <span class="invalid-feedback  " role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                  
                    </div>
                </div>
@endsection