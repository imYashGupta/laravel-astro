@extends('layouts.master')
@section("Notifications")
@section('css')
<style>
    .color{
        color:rgb(33, 37, 41);
    }
    .notification-icon{
        height: 50px;
        width: 50px;
        margin-right: 10px;
        border-radius: 50%;
        color: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .media:hover{
        color: #16181b;
        text-decoration: none;
        background-color: #f8f9fa !important;
    }
</style>
@endsection

@section('breadcrumb')
<h3 class="page-title">Notifications ({{ $unseen->count() }} Unread)</h1>
    @endsection

    @section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            
        @foreach ($notifications as $notification)

            <a href="{{ route("notification.redirect",$notification->id) }}" class="media mb-3 p-3 {{ $notification->seen ? 'bg-white' : 'active' }}  shadow color">
                <span class="notification-icon {{$notification->info['bg']}}">
                    <i class="mdi {{$notification->info['icon']}}"></i>
                </span>
                <div class="media-body d-flex justify-content-between ">
                    
                    <div>
                        <h5 class="m-0  ">{{ucfirst($notification->title)}}</h5>
                        <p class="m-0">{{$notification->message}}</p>
                    </div>
                    <span>{{ $notification->created_at->diffForHumans() }}</span>
                </div>
            </a>
            @endforeach
            {{ $notifications->links() }}
        </div><!-- container -->
    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
@endsection