@extends('layouts.user')
@section('styles')
<!-- include summernote css/js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">

@endsection
@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div>
        <div class="heading-and-upgrade-button mb-4">
            <h3 class="display-username">My Ticket</h3>
        </div>
        <div class="row">
            
            <div class="col-12 primary-content">
                
             @if($ticket->status==0)
                <div class="alert alert-warning bg-warning text-white " role="alert">
                    This ticket is closed. You may reply to this ticket to reopen it.
                </div>
                @endif
                




            </div>
            <div class="col-12 mt-3">
                <div class="card mb-3 w-75 float-right" >
                    <div class="card-header bg-primary text-white">
                        {{$ticket->user->name}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$ticket->message}}</p>
                        @if(count($ticket->getAttachments()) > 0)
                                  <h6 class="text-muted">Attachments:</h6>
                                  @endif
                                  @foreach ($ticket->getAttachments() as $file)
                                  <a href="{{$ticket->getAttachmentUrl($file)}}" target="_blank">
                                      <img  src="{{$ticket->getAttachmentUrl($file)}}" alt="" class="rounded img-thumbnail" style="width: 120px;">      
                                  </a>                                  
                                  @endforeach
                    </div>
                    <div class="card-footer text-muted  ">
                      {{$ticket->created_at->diffForHumans()}}
                    </div>
                </div>
                @foreach ($ticket->getReplies() as $reply)
                    <div class="card mb-3 w-75 @if($reply->user_id==auth()->user()->id) float-right @else float-left @endif  ">
                        <div class="card-header  @if($reply->user_id==auth()->user()->id) bg-primary text-white  @endif">
                            {{$reply->user->name}}
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{$reply->message}}</p>
                            @if(count($reply->getAttachments()) > 0)
                                <h6 class="text-muted">Attachments:</h6>
                                @endif
                                @foreach ($reply->getAttachments() as $file)
                                <a href="{{$reply->getAttachmentUrl($file)}}" target="_blank">
                                    <img  src="{{$reply ->getAttachmentUrl($file)}}" alt="" class="rounded img-thumbnail" style="width: 120px;">      
                                </a>                                  
                                @endforeach
                        </div>
                        <div class="card-footer text-muted">
                        {{$reply->created_at->diffForHumans()}}
                        </div>
                    </div>
                @endforeach

                
            </div>
            <div class="col-md-12 ">
                <form   method="POST" action="{{ route("ticket.storeReply",$ticket->id) }}" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-primary text-white" id="card-header" style="cursor: pointer;user-select: none;">
                            <i class="fa fa-pencil"></i>
                            Reply Ticket
                        </div>
                        <div class="card-body extra-padding  "  id="card">


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
                                <a href="supporttickets.php" class="btn btn-default">Back</a>
                            </p>

                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
    var simplemde = new SimpleMDE({
        element: document.getElementById("simplemde")
    });

    /* $("#card-header").click(function() {
        console.log("sad")
        $("#card").toggle();
    }) */
</script>
@endsection