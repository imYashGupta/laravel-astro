@extends('layouts.master')
@section('title',"Ticket #$ticket->id")

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<style>
    .cd-timeline-content::before {
    content: none !important;
 
}


</style>
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
                    <div class="card mb-3">

                        <div class="card-body">
                        <h3 class="card-title pb-3">Ticket #{{ $ticket->id }} Details</h3>
                        <div class="table-responsive">
                            <table class="card-table table   ">
                             
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$ticket->name}} (<a href="{{ route("users.edit",$ticket->user_id) }}">view profile</a>)</td>
                                        <th>Subject</th>
                                        <td>{{ $ticket->subject }}</td>
                                        <th>Priority</th>
                                        <td>{{ $ticket->priority }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $ticket->email }}</td>
                                        <th>Related service</th>
                                        <td>{{ is_null($ticket->service) ? "None" : $ticket->service }}</td>
                                        <th>Created on</th>
                                        <td>{{ $ticket->created_at->format("F d ,Y (H:i)") }}</td>
                                    </tr>
                                  
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="cd-timeline-content w-75 mb-3">
                                <h3> {{$ticket->user->name}} <small class="text-muted">(Initial Message)</small></h3>
                                <p id="init"  class="mb-3 text-muted mb-3">{!!$ticket->markdown()!!}</p>
                                @if(count($ticket->getAttachments()) > 0)
                                <h6 class="text-muted">Attachments:</h6>
                                @endif
                                @foreach ($ticket->getAttachments() as $file)
                                <a href="{{$ticket->getAttachmentUrl($file)}}" target="_blank">
                                    <img  src="{{$ticket->getAttachmentUrl($file)}}" alt="" class="rounded img-thumbnail" style="width: 120px;">      
                                </a>                                  
                                @endforeach
                                <span class="cd-date" > {{$ticket->created_at->diffForHumans()}}</span>
                            </div>
                            <div class="clearfix"></div>
                            @foreach ($ticket->getReplies() as $reply)
                            @if($ticket->user_id===auth()->user()->id)
                            <div class="cd-timeline-content w-75 mb-3">
                                <h3> {{$reply->user->name}} </h3>
                                <p class="mb-3 text-muted mb-3">{!!$reply->markdown()!!}</p>
                                @if(count($reply->getAttachments()) > 0)
                                <h6 class="text-muted">Attachments:</h6>
                                @endif
                                @foreach ($reply->getAttachments() as $file)
                                <a href="{{$reply->getAttachmentUrl($file)}}" target="_blank">
                                    <img  src="{{$reply->getAttachmentUrl($file)}}" alt="" class="rounded img-thumbnail" style="width: 120px;">      
                                </a>                                  
                                @endforeach
                                <span class="cd-date" > {{$reply->created_at->diffForHumans()}}</span>
                            </div>
                            <div class="clearfix"></div>
                            @else
                            <div class="cd-timeline-content w-75 mb-3 float-right">
                                <h3> {{$reply->user->name}} </h3>
                                <p  class="mb-3 text-muted mb-3 markdown">{!!$reply->markdown()!!}</p>
                                @if(count($reply->getAttachments()) > 0)
                                <h6 class="text-muted">Attachments:</h6>
                                @foreach ($reply->getAttachments() as $file)
                                <a href="{{$reply->getAttachmentUrl($file)}}" target="_blank">
                                    <img  src="{{$reply->getAttachmentUrl($file)}}" alt="" class="rounded img-thumbnail" style="width: 120px;">      
                                </a>                                  
                                @endforeach
                                @endif
                                <span class="cd-date" style="right: 22%;left:auto">{{$reply->created_at->diffForHumans()}}</span>
                            </div>
                            <div class="clearfix"></div>
                            @endif
                        @endforeach
                        </div>
                    </div>

                    <form method="POST" action="{{ route("support-tickets.store",$ticket->id) }}" enctype="multipart/form-data" role="form">
                        @csrf
                        <div class="card mt-3">
                            <div class="card-header bg-primary text-white"   style="cursor: pointer;user-select: none;">
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

                                    <button type="submit" id="closeTicketSubmit" class="btn btn-secondary" name="close" value="true">
                                        Submit And Closed Ticket
                                    </button>
                                </p>

                            </div>
                        </div>

                    </form>

                </div>
                {{-- <div class="col-12 mt-3">
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
                </div> --}}

            </div>
        </div><!-- container -->
    </div> <!-- Page content Wrapper -->
    @endsection

    @section('script')
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

    <script>
        var simplemde = new SimpleMDE({
            element: document.getElementById("simplemde")
        });
        
        $("#openTicketSubmit").click(function(){
            console.log(simplemde.value())
        })


        function  renderMarkdown($id){
            console.log($id)
        }

        const md = `
            # heading

            [link][1]

            [1]: #heading "heading"
            `;

            const tokens = marked.lexer(md);
            console.log(tokens);

            const html = marked.parser(tokens);
            console.log(html);

            $("#init").innerHTML = html;
      
    </script>
    @endsection