
@extends('admin.layouts.guest')
@section('contente')
{{-- message --}}
{!! Toastr::message() !!}

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row invoice-card-row">
            @if (count($templates) > 0)
            @foreach($templates as $template)
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="card  invoice-card">
                    <div class="card-body d-flex">
                        <div class="template">
                            <img src="{{url($template->temp_image)}}"  width="100%" alt="">
                            <h1 class="text-center mt-2">{{$template->title}}</h1>
                            
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
@endif
        </div>
       
    </div>
   
</div>

@endsection
