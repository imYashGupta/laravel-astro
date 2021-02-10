@extends('layouts.master')
@section('title',"Services")
@section('css')
@endsection

@section('breadcrumb')
<h3 class="page-title">Services</h1>
@endsection

@section('content')
  <div class="page-content-wrapper">
                <div class="container-fluid">
                @include('components.alert')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr>
                            <td class="text-capitalize">
                                <img src="{{ json_decode($service->content,true)["main"] }}" alt="">
                            </td>
                            <td class="text-capitalize">{{ str_replace("-"," ",$service->name) }}</td>
                            <td>
                                <a href="{{ route("page.service",$service->name) }}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
                </div><!-- container -->
            </div> <!-- Page content Wrapper -->
@endsection

@section('script')
@endsection

