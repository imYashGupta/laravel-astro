@extends('layouts.master')
@section('title',"An Error Occurred!")

@section('css')
@endsection

@section('breadcrumb')
<h3 class="page-title">An Error Occurred!</h1>
@endsection

@section('content')
            <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="ex-page-content text-center">
                                                <h1 class="">{{$code}}!</h1>
                                                <h3 class="">{{$message}}</h3><br>
                                                <a class="btn btn-primary mb-5 waves-effect waves-light" href="{{route("dashboard")}}">Back to Dashboard</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- container -->
                    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
@endsection

