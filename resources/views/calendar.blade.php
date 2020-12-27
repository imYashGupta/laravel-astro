@extends('layouts.master')

@section('css')
<!--calendar css-->
<link href="{{ URL::asset('assets/plugins/fullcalendar/css/fullcalendar.min.css') }}" rel="stylesheet" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Calendar</h1>
@endsection


@section('content')
       <div class="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id='calendar'></div>
                                      <div style='clear:both'></div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div><!-- container -->
         </div> <!-- Page content Wrapper -->
@endsection

@section('script')
<script src="{{ URL::asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/moment/moment.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/js/fullcalendar.min.js') }}"></script>
<script src="{{ URL::asset('assets/pages/calendar-init.js') }}"></script>
@endsection