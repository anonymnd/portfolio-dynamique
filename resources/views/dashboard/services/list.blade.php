@extends('layouts.guest')
@section('contente')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}
{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('dashboard.services.list') }}">Table</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Services Content list</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Services Content list</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                    <th scope="col">Icon </th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($services)> 0)
                                    @foreach($services as $service)
                                    <tr>
                                         <td class="title"><i class="{{$service->icon}}"></i></td>
                                        <td class="title">{{$service->title}}</td>
                                        <td class="title" >{{ Str::limit(strip_tags($service->description), 40) }}</td>
                                     <td>  
                                        <div class="d-flex">
                                            <a href="{{route('dashboard.services.edit',$service->id)}}" class="btn btn-primary shadow btn-xs sharp me-1 edit_user" ><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('dashboard.services.destroy', $service->id) }}" method="POST">
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
                                    <th>Icon </th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
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
