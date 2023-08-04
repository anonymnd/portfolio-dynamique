@extends('layouts.guest')
@section('contente')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}

{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin.templates.create') }}">Create Languages</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Languages</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('dashboard.languages.update',$languages->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div >
                            <div class="row">
                                <div class="mb-3 col-md-6 my-2">
                                    <label class="form-label">language_name</label>
                                    <input type="text" class="form-control" id="language_name" name="language_name" value="{{$languages->language_name}}" >
                                </div>
                                <div class="mb-2 col-md-6 my-2">
                                    <label class="form-label">Level</label>
                                    <input type="text" class="form-control" id="level" name="level" value="{{$languages->level}}">
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
