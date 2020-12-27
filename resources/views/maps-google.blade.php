@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<h3 class="page-title">Google Maps</h1>
@endsection

@section('content')
    <div class="page-content-wrapper">
                <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Markers</h4>
                                            <p class="text-muted m-b-30 font-14">Example of google maps.</p>
                                            <div id="gmaps-markers" class="gmaps"></div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Overlays</h4>
                                            <p class="text-muted m-b-30 font-14">Example of google maps.</p>
                                            <div id="gmaps-overlay" class="gmaps"></div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Street View Panoramas</h4>
                                            <p class="text-muted m-b-30 font-14">Example of google maps.</p>
                                            <div id="panorama" class="gmaps-panaroma"></div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Map Types</h4>
                                            <p class="text-muted m-b-30 font-14">Example of google maps.</p>
                                            <div id="gmaps-types" class="gmaps"></div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div><!-- container -->
                    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
<!-- google maps api -->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>
<!-- Gmaps file -->
<script src="{{ URL::asset('assets/plugins/gmaps/gmaps.min.js') }}"></script>
<!-- demo codes -->
<script src="{{ URL::asset('assets/pages/gmaps.js') }}"></script>
@endsection

