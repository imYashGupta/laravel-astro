@extends("layouts.user")
@section("content")
<div class="col-xl-9 col-lg-9 col-md-12">
                    <div class="main-center-data">
                        <h3 class="display-username">Password update</h3>
                        <div class="informative-block bg-white round-crn pd-20-30 mt-15 hover-effect-box">
                            <form action="{{ route("user.profile.update") }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="password-text-input" class="col-sm-2 col-form-label label-mute">New Password</label>
                                    <div class="col-sm-6">
                                        <input name="password" class="form-control   @error('password') is-invalid @enderror" type="password"   id="password-text-input">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirmation-text-input" class="col-sm-2 col-form-label label-mute">Confirm Password</label>
                                    <div class="col-sm-6">
                                        <input name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" type="password"   id="password_confirmation-text-input">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback  " role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <button class="btn btn-primary">Update Password</button>
                                </div>
                            </form>
                        </div>
                       
                  
                    </div>
                </div>
@endsection