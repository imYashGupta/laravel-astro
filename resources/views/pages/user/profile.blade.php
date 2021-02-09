@extends("layouts.user")
@section("content")
<div class="col-xl-9 col-lg-9 col-md-12">
                    <div class="main-center-data">
                        <h3 class="display-username">Profile Setup</h3>
                        @include('components.alert')
                        <div class="informative-block bg-white round-crn pd-20-30 mt-15 hover-effect-box">
                            <h4 class="font-weight-bold">User Info</h4>
                            <a href="{{ route("user.profile.edit") }}"><span class="edit-details"><img src="src/user/img/edit.svg" alt="edit" /></span></a>
                            <table class="table-responsive mt-15">
                                <tbody>
                                    <tr>
                                        <td class="label-mute">Name</td>
                                        <td>{{auth()->user()->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="label-mute">Email</td>
                                        <td>{{auth()->user()->email}}</td>
                                    </tr>
                                    <tr>
                                        <td class="label-mute">Phone</td>
                                        <td>{{auth()->user()->phone}}</td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="informative-block bg-white round-crn pd-20-30 mt-15 hover-effect-box">
                            <h4 class="font-weight-bold">Address Info</h4>
                            <a href="{{ route("user.profile.edit") }}">
                                <span class="edit-details"><img src="src/user/img/edit.svg" alt="edit" /></span>
                            </a>
                            <table class="table-responsive mt-15">
                                <tbody>
                                    <tr>
                                        <td class="label-mute">Address</td>
                                        <td>{{auth()->user()->address}}<br/>{{ auth()->user()->city_str}} {{auth()->user()->state_str}}, {{auth()->user()->country_str}} {{auth()->user()->pincode}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="informative-block bg-white round-crn pd-20-30 mt-15 hover-effect-box">
                            <h4 class="font-weight-bold">Password</h4>
                            <a href="{{ route("user.profile.password") }}">
                                <span class="edit-details"><img src="src/user/img/edit.svg" alt="edit" /></span>
                            </a>
                            <table class="table-responsive mt-15">
                                <tbody>
                                    <tr>
                                        <td class="label-mute">Password</td>
                                        <td>*********</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
@endsection