@extends('layouts.guest')
@section('contente')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}

{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('dashboard.education.edit',$educations->id) }}">Create Education</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Education</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('dashboard.education.update',$educations->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                        <div >
                            <div class="row">

                                <div class="mb-3 col-md-6 my-2">
                                    <label class="form-label">Date</label>
                                    <input type="text" class="form-control" id="date" name="date" value="{{$educations->date}}">
                                </div>
                                <div class="mb-2 col-md-6 my-2">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{$educations->title}}">
                                </div>
                                <div class="mb-3 col-md-6 my-2">
                                    <label class="form-label">Place</label>
                                    <input type="text" class="form-control" id="place" name="place" value="{{$educations->place}}">
                                </div>
                                <div class="mb-2 col-md-6 my-2">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" value="{{$educations->description}}">
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
