@extends('layouts.master')

@section('css')
<!-- jvectormap -->
<link href="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<h3 class="page-title">Vector Map</h1>
@endsection

@section('content')
            <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">World Map</h4>
                                            <p class="text-muted m-b-30 font-14">Example of vector map.</p>
                                            <div id="world-map-markers" style="height: 400px"></div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">USA Map</h4>
                                            <p class="text-muted m-b-30 font-14">Example of vector map.</p>
                                            <div id="usa" style="height: 400px"></div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">UK Map</h4>
                                            <p class="text-muted m-b-30 font-14">Example of vector map.</p>
                                            <div id="uk" style="height: 400px"></div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Chicago Map</h4>
                                            <p class="text-muted m-b-30 font-14">Example of vector map.</p>
                                            <div id="chicago" style="height: 400px"></div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div><!-- container -->
                    </div> <!-- Page content Wrapper -->
@endsection

@section('script')

  <!-- Jvector Map js -->
        <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/jvectormap/gdp-data.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-uk-mill-en.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-us-il-chicago-mill-en.js') }}"></script>
        <script src="{{ URL::asset('assets/pages/jvectormap.init.js') }}"></script>


@endsection

