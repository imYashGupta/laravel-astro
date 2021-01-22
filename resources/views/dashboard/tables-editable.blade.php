@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<h3 class="page-title">Table Editable</h1>
@endsection

@section('content')
       <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Examples</h4>
                                            <p class="text-muted m-b-30 font-14">just start typing to edit, or move around with arrow keys or mouse clicks!</p>

                                            <table id="mainTable" class="table table-striped m-b-0">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Cost</th>
                                                    <th>Profit</th>
                                                    <th>Fun</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Car</td>
                                                    <td>100</td>
                                                    <td>200</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Bike</td>
                                                    <td>330</td>
                                                    <td>240</td>
                                                    <td>1</td>
                                                </tr>
                                                <tr>
                                                    <td>Plane</td>
                                                    <td>430</td>
                                                    <td>540</td>
                                                    <td>3</td>
                                                </tr>
                                                <tr>
                                                    <td>Yacht</td>
                                                    <td>100</td>
                                                    <td>200</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Segway</td>
                                                    <td>330</td>
                                                    <td>240</td>
                                                    <td>1</td>
                                                </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th><strong>TOTAL</strong></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div><!-- container -->
                    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
 <!-- Table editable -->
<script src="{{ URL::asset('assets/plugins/tiny-editable/mindmup-editabletable.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/tiny-editable/numeric-input-example.js') }}"></script>
@endsection

@section('script-bottom')
<script>
     $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
</script>
@endsection

