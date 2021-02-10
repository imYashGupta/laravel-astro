@extends('layouts.master')
@section('title',"Ticket #$ticket->id")

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">

@endsection

@section('breadcrumb')
<h3 class="page-title">Ticket</h1>
@endsection

@section('content')
  <div class="page-content-wrapper">
                <div class="container-fluid">
                    
                @if($ticket->status==0)
                <div class="alert alert-warning bg-warning text-white " role="alert">
                    This ticket is closed. You may reply to this ticket to reopen it.
                </div>
                @endif
                <div class="row">
            <div class="col-12 primary-content">
               
                <form method="POST" action="{{ route("support-tickets.store",$ticket->id) }}" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="card">
                        <div class="card-header" id="card-header" style="cursor: pointer;user-select: none;">
                            <i class="fa fa-pencil"></i>
                            Reply Ticket
                        </div>
                        <div class="card-body extra-padding  " @if ($errors->any())  @else style="display: none;-webkit-user-select: none;" @endif id="card">


                            <div class="form-group">
                                <label for="inputMessage">Message</label>
                                @error('message')
                                <span class="invalid-feedback mb-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <textarea id="simplemde" name="message"></textarea>

                            </div>

                            <div class="form-group">
                                <label for="inputAttachments">Attachments</label>
                                <input type="file" class="form-control-file" id="inputAttachments" multiple name="attachments[]">
                                <div class="text-muted">
                                    <small>Allowed File Extensions: .jpg, .gif, .jpeg, .png</small>
                                </div>
                                @error('attachments.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>





                            <p class="text-center">
                                <button type="submit" id="openTicketSubmit" class="btn btn-primary">
                                    Submit
                                </button>

                                <button type="submit" id="openTicketSubmit" class="btn btn-secondary" name="close" value="true">
                                    Submit And Closed Ticket
                                </button>
                            </p>

                        </div>
                    </div>

                </form>




            </div>
            <div class="col-12 mt-3">
                @foreach ($ticket->getReplies() as $reply)
                    <div class="card mb-3 shadow">
                        <div class="card-header">
                            {{$reply->user->name}}
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{$reply->message}}</p>
                        </div>
                        <div class="card-footer text-muted">
                        {{$reply->created_at->diffForHumans()}}
                        </div>
                    </div>
                @endforeach
                <div class="card shadow">
                    <div class="card-header">
                        {{$ticket->user->name}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$ticket->message}}</p>
                    </div>
                    <div class="card-footer text-muted">
                      {{$ticket->created_at->diffForHumans()}}
                    </div>
                </div>
            </div>

        </div>
                 </div><!-- container -->
            </div> <!-- Page content Wrapper -->
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
    var simplemde = new SimpleMDE({
        element: document.getElementById("simplemde")
    });

    $("#card-header").click(function() {
        console.log("sad")
        $("#card").toggle();
    })
</script>
@endsection

