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
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Centre D'Interet Content list</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Centre D'Interet Content list</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($hobbies)> 0)
                                    @foreach($hobbies as $hobbie)
                                    <tr>
                                        
                                        <td class="title">{{$hobbie->icon}}</td>
                                        <td class="title">{{$hobbie->name}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('dashboard.hobbies.edit',$hobbie->id)}}" class="btn btn-primary shadow btn-xs sharp me-1 edit_user" ><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{ route('dashboard.hobbies.destroy', $hobbie->id) }}" method="POST">
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
                                    <th>icon </th>
                                    <th>name</th>
                                        <th>action</th>
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
