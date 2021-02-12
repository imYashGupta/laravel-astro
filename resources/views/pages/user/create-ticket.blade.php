@extends('layouts.user') 
@section('styles')
    <!-- include summernote css/js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">

    @endsection
@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="row">
        <div class="col-12 primary-content">
            <form method="POST" action="{{ route("tickets.store") }}" enctype="multipart/form-data" role="form">
                @csrf
                <div class="card">
                    <div class="card-body extra-padding">
                        <h3 class="card-title">Create new Support Request</h3>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="inputName">Name</label>
                                <input type="text" name="name" id="inputName" value="{{ auth()->user()->name }}"
                                    class="form-control disabled" disabled="disabled">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputEmail">Email Address</label>
                                <input type="email" name="email" id="inputEmail" value="{{ auth()->user()->email }}"
                                    class="form-control disabled" disabled="disabled">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-10">
                                <label for="inputSubject">Subject</label>
                                <input type="text" name="subject" id="inputSubject"   class="form-control @error('subject') is-invalid @enderror">
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="form-group col-md-5">
                                <label for="inputRelatedService">Related Service</label>
                                <select name="service" id="inputRelatedService" class="form-control @error('service') is-invalid @enderror">
                                    <option value="">None</option>
                                    @foreach ($orders as $item)
                                        
                                    <option value="Order #{{$item->id}}">
                                        Order #{{$item->id}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('service')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPriority">Priority</label>
                                <select name="urgency" id="inputPriority" class="form-control  @error('urgency') is-invalid @enderror">
                                    <option value="High">
                                        High
                                    </option>
                                    <option value="Medium" selected="selected">
                                        Medium
                                    </option>
                                    <option value="Low">
                                        Low
                                    </option>
                                </select>
                                @error('urgency')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputMessage">Message</label>
                            @error('message')
                            <span class="invalid-feedback mb-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <textarea id="simplemde" name="message"  ></textarea>
                           
                        </div>

                        <div class="form-group">
                            <label for="inputAttachments">Attachments</label>
                            <input type="file" class="form-control-file " id="inputAttachments" multiple name="attachments[]">
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
                        </p>

                    </div>
                </div>

            </form>

           


        </div>

    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
    var simplemde = new SimpleMDE({ element: document.getElementById("simplemde") });
    </script>
@endsection