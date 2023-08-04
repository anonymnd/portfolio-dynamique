
@extends('layouts.guest')
@section('contente')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}

{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('dashboard.aboutme.create') }}">About Edit</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Your About Section</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('dashboard.aboutme.update',$aboutme->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                        <div >
                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Image</label>
                                    <img style="height: 35vh; width: 95%" src="{{url($aboutme->image)}}" class="img-thumbnail">
                                    <input class="mt-3" type="file" name="image" value="image">
                                </div>
                                <div class="mb-2 col-md-6 my-5">
                                    <label class="form-label">full_name</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{$aboutme->full_name}}">
                                </div>
                                <div class="mb-3 col-md-6 my-2">
                                    <label class="form-label">Job</label>
                                    <input type="text" class="form-control" id="job" name="job" value="{{$aboutme->job}}">
                                </div>
                                <div class="mb-2 col-md-6 my-2">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" value="{{$aboutme->description}}">
                                </div>
                                <div class="mb-3 col-md-6 my-2">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" class="form-control" id="birthday" name="birthday"  value="{{$aboutme->birthday}}">
                                </div>
                                <div class="mb-2 col-md-6 my-2">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{$aboutme->city}}">
                                </div>

                            </div>
                            <div class="submit-section my-1">
                                <button type="submit" class="btn btn-primary-save submit-btn">Save</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
