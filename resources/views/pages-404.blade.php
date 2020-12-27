@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<h3 class="page-title">Error</h1>
@endsection

@section('content')
            <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="ex-page-content text-center">
                                                <h1 class="">404!</h1>
                                                <h3 class="">Sorry, page not found</h3><br>
                                                <a class="btn btn-primary mb-5 waves-effect waves-light" href="index">Back to Dashboard</a>
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

