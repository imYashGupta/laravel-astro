@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
    <h3 class="page-title">Settings</h1>
    @endsection

    @section('content')
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <h4 class="card-title">Website Info</h4>
                               
                                <p class="card-title-desc">Site Settings</p>
                                <form action="{{ route("settings.update") }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="website-name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control @error("name") is-invalid @endif " type="text" id="website-name"
                                                autocomplete="off" name="name" value="{{ $name->value }}" />
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input class="form-control @error("title") is-invalid @endif " type="text" id="title"
                                                autocomplete="off" name="title" value="{{ $title->value }}" />
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="website-description" class="col-sm-2 col-form-label">Meta Description</label>
                                        <div class="col-sm-10">
                                            <input class="form-control @error("description") is-invalid @endif " type="text" id="website-description"
                                                autocomplete="off" name="description" value="{{ $description->value }}" />
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="keywords" class="col-sm-2 col-form-label">Meta Keywords</label>
                                        <div class="col-sm-10">
                                            <input class="form-control @error("keywords") is-invalid @endif " type="text" id="keywords"
                                                autocomplete="off" name="keywords" value="{{ $keywords->value }}" />
                                            @error('keywords')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="website-email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input class="form-control @error("email") is-invalid @endif" type="email"  name="email"
                                                id="website-email"  value="{{ $email->value }}">
                                                @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input class="form-control @error("phone") is-invalid @endif" type="tel" name="phone"
                                                id="phone" autocomplete="off" value="{{ $phone->value }}">
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input class="form-control @error("address") is-invalid @endif" type="text"  name="address"
                                                id="address" autocomplete="off" value="{{ $address->value }}">
                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mapdata" class="col-sm-2 col-form-label">Map Data</label>
                                        <div class="col-sm-10">
                                            <input class="form-control @error("map_data") is-invalid @endif" type="text"  name="map_data"
                                                id="mapdata" autocomplete="off" value="{{ $map_data->value }}">
                                                @error('map_data')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="logo" class="col-sm-2 col-form-label">Main logo (5:2)</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="filestyle @error("logo") is-invalid @endif" data-buttonname="btn-secondary" name="logo" id="logo">
                                            @error('logo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            <img src="{{ $logo->value }}"
                                                height="75" class="mt-3 mb-3" alt="logo" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="favicon" class="col-sm-2 col-form-label">Favicon</label>
                                        <div class="col-sm-5">
                                            <input type="file" id="favicon" class="filestyle @error("favicon") is-invalid @endif" data-buttonname="btn-secondary" name="favicon">
                                            @error('favicon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <img src="{{ $favicon->value }}" alt="favicon"
                                                height="64" class="mt-3">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="footer_text" class="col-sm-2 col-form-label">Footer Text</label>
                                        <div class="col-sm-10">
                                                <textarea name="footer_text" class="form-control @error("footer_text") is-invalid @endif" id="footer_text" cols="3" rows="2">{{ $footer_text->value }}</textarea>
                                                @error('footer_text')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 ">
                                            <button type="submit" class="btn btn-success waves-effect waves-light text-right">Save Changes</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div><!-- container -->
        </div> <!-- Page content Wrapper -->
    @endsection

    @section('script')
        <script src="{{ URL::asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>

    @endsection
