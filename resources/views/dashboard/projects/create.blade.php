@extends('layouts.guest')
@section('contente')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}

{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('dashboard.projects.create') }}">Create Project</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Projects</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('dashboard.projects.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                        <div >
                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Big Image</label>
                                    <img style="height: 35vh; width: 95%"  src="{{ URL::to('assets/images/big_image.jpg') }}" class="img-thumbnail">
                                    <input class="mt-3" type="file" name="big_image">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label"> Small Image</label>
                                    <img style="height: 35vh; width: 95%"  src="{{ URL::to('assets/images/small_image.jpg') }}" class="img-thumbnail">
                                    <input class="mt-3" type="file" name="small_image">
                                </div>

                                <div class="mb-1 col-md-5 my-5">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" >
                                </div>
                                <div class="mb-1 col-md-5 my-5">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" class="form-control" id="sub_title" name="sub_title" >
                                </div>
                                <div class="mb-1 col-md-5 my-5">
                                    <label class="form-label">Client</label>
                                    <input type="text" class="form-control" id="client" name="client" >
                                </div>
                                <div class="mb-1 col-md-5 my-5">
                                    <label class="form-label">Category</label>
                                    <input type="text" class="form-control" id="category" name="category" >
                                </div>
                                <div class="mb-1 col-md-5 my-5">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" >
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
