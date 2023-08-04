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
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">projects Content</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Projects Content</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Sub Title</th>
                                    <th scope="col">Big Image</th>
                                    <th scope="col">Small Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($projects)> 0)
                                    @foreach($projects as $project)

                                    <tr>
                                    <td class="title">{{$project->title}}</td>
                                    <td class="title">{{$project->sub_title}}</td>


                                        <td>
                                            <img style="height:20vh" src="{{url($project->big_image)}}" alt="image">
                                        </td>
                                        <td>
                                            <img style="height:20vh" src="{{url($project->small_image)}}" alt="image">
                                        </td>
                                        <td class="title">{{Str::limit(strip_tags($project->description),40)}}</td>
                                        <td class="title">{{$project->client}}</td>
                                        <td class="title">{{$project->category}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('dashboard.projects.edit',$project->id)}}" class="btn btn-primary shadow btn-xs sharp me-1 edit_user" ><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{ route('dashboard.projects.destroy', $project->id) }}" method="POST">
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
                                        <th>title</th>
                                        <th>sub_title</th>
                                        <th>big image</th>
                                        <th>small image</th>
                                        <th>description</th>
                                        <th>client</th>
                                        <th>category</th>
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
