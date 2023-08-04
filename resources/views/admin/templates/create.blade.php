@extends('admin.layouts.guest')
@section('contente')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}

{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin.templates.create') }}">Create a Template</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create New Template</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.templates.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT')}}
                        <div >
                            <div class="row">
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Templae Image</label>
                                    <img style="height: 35vh; width: 95%"  src="{{asset('assets/images/temp_image.jpg')}}" class="img-thumbnail">
                                    <input class="mt-3" type="file" name="temp_image">
                                </div>
                                <div class="mb-1 col-md-5 my-5">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" >
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
