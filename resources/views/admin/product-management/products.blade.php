@extends('layouts.master')

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Products List</h1>
@endsection

@section('content')
                <div class="page-content-wrapper">
                        <div class="container-fluid">
           @include('components.alert')

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <a href="{{ route("product.create")}}" class="btn btn-sm btn-primary text-white float-right">Add Product</a>

                                            <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Added Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse ($products as $product)
                                                <tr>
                                                    <td class="product-list-img sorting_1" tabindex="0">
                                                        <img  src="{{ $product->thumbnailUrl }}" class="img-fluid avatar-md rounded" alt="Product Image">
                                                    </td>
                                                    <td>
                                                        <h6 class="mt-0 m-b-5">{{$product->name}}</h6>
                                                        <p class="m-0 font-14">{{\Illuminate\Support\Str::limit($product->short_description,50,'...')}}</p>
                                                    </td>
                                                    <td>
                                                        {{$product->category}}
                                                    </td>
                                                    <td>&#x20B9;{{$product->price}}</td>
                                                   
                                                    <td>{{$product->created_at->format("d M,Y | h:i A")}} 
                                                    </td>
                                                 
                                                    <td>
                                                    <a href="{{route("product.edit",$product->id)}}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                    <a   href="" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-delete font-18"></i></a>
                                                    </td>
                                                </tr>
                                                @empty
                                                    
                                                
                                                @endforelse
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
<!-- Datatable js -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
@endsection

@section('script-bottom')
<script type="text/javascript">
    $(document).ready(function () {
          $('#datatable').DataTable();
    });
</script>

@endsection