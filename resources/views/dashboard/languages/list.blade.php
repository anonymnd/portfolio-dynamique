@extends('layouts.guest')
@section('contente')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}
{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('dashboard.languages.list') }}">Table of Languages</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">All Templates</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Languages</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Language Name</th>
                                        <th scope="col">Level</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($languages)> 0)
                                    @foreach($languages as $language)
                                    <tr>
                                        <td class="language_name">  {{$language->language_name}}</td>
                                        <td class="title">{{$language->level}}</td>
                                        
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('dashboard.languages.edit',$language->id)}}" class="btn btn-primary shadow btn-xs sharp me-1 edit_user" ><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{ route('dashboard.languages.destroy', $language->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  class="btn btn-danger shadow btn-xs sharp delete_user"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>												
                                        </td>									
                                    </tr>
                                    @endforeach
                                    @endif
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Language Name</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
