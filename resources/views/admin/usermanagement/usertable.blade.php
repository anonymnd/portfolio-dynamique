@extends('admin.layouts.guest')
@section('contente')
<link href="{{ URL::to('assets/css/custom_style.css') }}" rel="stylesheet">
{{-- message --}}
{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Table</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">All User</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List User</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user_table as $key=>$items)
                                    <tr>
                                        <td class="name">{{$items->name}}</td>
                                        <td hidden class="role_name">{{$items->role_name}}</td>
                                        <td class="email">{{$items->email}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <!--a class="btn btn-primary shadow btn-xs sharp me-1 edit_user" href="#" data-toggle="modal" data-target="#edit_user"><i class="fas fa-pencil-alt"></i></a-->
                                                <a class="btn btn-danger shadow btn-xs sharp delete_user" href="#" data-id="{{ $items->id }}" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash"></i></a>
                                            </div>												
                                        </td>	
                                        @if ($items->status =='active')
                                        <td>
                                            <span class="badge light badge-success">
                                            <i class="fa fa-circle text-success me-1"></i>{{$items->status}}
                                            </span>
                                        </td>
                                        @else
                                        <td>
                                            <span class="badge light badge-denger">
                                            <i class="fa fa-circle text-denger me-1"></i>{{$items->status}}
                                            </span>
                                        </td>
                                        @endif
                                        											
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
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

<!-- Edit Expense Modal -->
<div id="edit_user" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('/admin/user/update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">User ID</label>
                            <input type="text" class="form-control" id="e_user_id" name="user_id" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="e_name" name="name">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="e_email" name="email">
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary-save submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Expense Modal -->

<!-- Delete User Modal -->
<div class="modal custom-modal fade" id="delete_user" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete User</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form action="{{ route('/admin/user/delete') }}" method="POST">
                        @csrf
                        <input type="hidden" id="e_id" name="id">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary-cus continue-btn submit-btn">Delete</button>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary-cus cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete User Modal -->
@section('script')
    <!-- Bootstrap Core JS -->
    <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>
    
    {{-- show data on model or edit --}}
    <script>
        $(document).on('click','.edit_user',function()
        {
            var _this = $(this).parents('tr');
            $('#e_user_id').val(_this.find('.user_id').text());
            $('#e_name').val(_this.find('.name').text());
            $('#e_email').val(_this.find('.email').text());
        });
    </script>

    {{-- delete user --}}
    <script>
        // delete user
$(document).on('click', '.delete_user', function() {
    var userId = $(this).data('id');
    $('#e_id').val(userId);
});

    </script>

@endsection
@endsection
