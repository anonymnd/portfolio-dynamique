@extends('layouts.guest')
@section('contente')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}
{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Table</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">About Content</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">About Content</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Full_Name</th>
                                    <th scope="col">Job</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Birthday</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($aboutme)> 0)
                                    @foreach($aboutme as $aboutme)
                                    <tr>
                                        <td>
                                            <img style="height:20vh" src="{{url($aboutme->image)}}" alt="image">
                                        </td>
                                        <td class="title">{{$aboutme->full_name}}</td>
                                        <td class="title">{{$aboutme->job}}</td>
                                        <td class="title">{{$aboutme->description}}</td>
                                        <td class="title">{{$aboutme->birthday}}</td>
                                        <td class="title">{{$aboutme->city}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('dashboard.aboutme.edit',$aboutme->id)}}" class="btn btn-primary shadow btn-xs sharp me-1 edit_user" ><i class="fas fa-pencil-alt"></i></a>
                                                <div>
                                                    <form action="{{ route('dashboard.aboutme.destroy', $aboutme->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button  class="btn btn-danger shadow btn-xs sharp delete_user"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                                                                        
                                                </div>
                                            </div>	
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>image</th>
                                        <th>Full_Name</th>
                                        <th>Job</th>
                                        <th>Description</th>
                                        <th>Birthday</th>
                                        <th>City</th>
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

@section('script')
    <!-- Bootstrap Core JS -->
    <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>

    {{-- show data on model or edit --}}


    {{-- delete user --}}
    <script>
        $(document).on('click','.delete_template',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.template_id').text());
        });
    </script>

@endsection
@endsection
