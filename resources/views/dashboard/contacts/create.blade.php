@extends('layouts.guest')
@section('contente')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}

{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('dashboard.contacts.create') }}">Create Contacts</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Contact</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('dashboard.contacts.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div >
                            <div class="row">
                                <div class="mb-1 col-md-5 my-5">
                                    <label class="form-label">Icon</label>
                                    <input type="text" class="form-control" id="icon" name="icon" >
                                </div>
                                <div class="mb-1 col-md-5 my-5">
                                    <label class="form-label">name</label>
                                    <input type="text" class="form-control" id="name" name="name" >
                                </div>
                                <div class="mb-1 col-md-5 my-5">
                                    <label class="form-label">lien</label>
                                    <input type="text" class="form-control" id="lien" name="lien" >
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
