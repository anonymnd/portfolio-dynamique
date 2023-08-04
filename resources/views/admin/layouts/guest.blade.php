<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard">
	<meta name="author" content="Soeng Souy">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Soeng Souy : Admin Template">
	<meta property="og:title" content="Soeng Souy : Admin Template">
	<meta property="og:description" content="Soeng Souy:Admin Template">
	<meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	<!-- PAGE TITLE HERE -->
	<title>Dashboard Page</title>
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{URL::to('assets/images/favicon.png')}}">
	<link href="{{URL::to('assets/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{URL::to('assets/vendor/nouislider/nouislider.min.css')}}">
	<!-- Datatable -->
	<link href="{{URL::to('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<!-- Custom Stylesheet -->
	<link href="{{URL::to('assets/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<!-- Style css -->
    <link href="{{URL::to('assets/css/style.css')}}" rel="stylesheet">

	{{-- message toastr --}}
	<link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
	<script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
    @php
    $manifest = json_decode(file_get_contents(public_path('mix-manifest.json')), true);
@endphp

<link href="{{ $manifest['/css/app.css'] }}" rel="stylesheet">
<script src="{{ $manifest['/js/app.js'] }}" defer></script>
	
</head>
<body>

    <!-- Preloader start -->
    <div id="preloader">
        <div class="waviy">
		   <span style="--i:1">L</span>
		   <span style="--i:2">o</span>
		   <span style="--i:3">a</span>
		   <span style="--i:4">d</span>
		   <span style="--i:5">i</span>
		   <span style="--i:6">n</span>
		   <span style="--i:7">g</span>
		   <span style="--i:8">.</span>
		   <span style="--i:9">.</span>
		   <span style="--i:10">.</span>
		</div>
    </div>
    <!-- Preloader end -->
	

    <!-- Main wrapper start -->
    <div id="main-wrapper">
        <!-- Nav header start -->
        <div class="nav-header">
            <a href="{{ route('admin.dashboard') }}" class="brand-logo">
				<svg class="logo-abbr" width="53" height="53" viewbox="0 0 53 53">
					<path d="M21.6348 8.04782C21.6348 5.1939 23.9566 2.87204 26.8105 2.87204H28.6018L28.0614 1.37003C27.7576 0.525342 26.9616 0 26.1132 0C25.8781 0 25.639 0.0403711 25.4052 0.125461L7.3052 6.7133C6.22916 7.105 5.67535 8.29574 6.06933 9.37096L7.02571 11.9814H21.6348V8.04782Z" fill="#759DD9"></path>
					<path d="M26.8105 5.97754C25.6671 5.97754 24.7402 6.90442 24.7402 8.04786V11.9815H42.8555V8.04786C42.8555 6.90442 41.9286 5.97754 40.7852 5.97754H26.8105Z" fill="#F8A961"></path>
					<path class="svg-logo-primary-path" d="M48.3418 41.8457H41.0957C36.8148 41.8457 33.332 38.3629 33.332 34.082C33.332 29.8011 36.8148 26.3184 41.0957 26.3184H48.3418V19.2275C48.3418 16.9408 46.4879 15.0869 44.2012 15.0869H4.14062C1.85386 15.0869 0 16.9408 0 19.2275V48.8594C0 51.1462 1.85386 53 4.14062 53H44.2012C46.4879 53 48.3418 51.1462 48.3418 48.8594V41.8457Z" fill="#5BCFC5"></path>
					<path class="svg-logo-primary-path" d="M51.4473 29.4238H41.0957C38.5272 29.4238 36.4375 31.5135 36.4375 34.082C36.4375 36.6506 38.5272 38.7402 41.0957 38.7402H51.4473C52.3034 38.7402 53 38.0437 53 37.1875V30.9766C53 30.1204 52.3034 29.4238 51.4473 29.4238ZM41.0957 35.6348C40.2382 35.6348 39.543 34.9396 39.543 34.082C39.543 33.2245 40.2382 32.5293 41.0957 32.5293C41.9532 32.5293 42.6484 33.2245 42.6484 34.082C42.6484 34.9396 41.9532 35.6348 41.0957 35.6348Z" fill="#5BCFC5"></path>
				</svg>
                <img src="{{ URL::to('assets/images/logo-file.png') }}" alt="" width="150" height="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!-- Nav header end -->
		
		<!-- Chat box start -->
	
		<!-- Chat box End -->

		<!-- Header start -->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                Dashboard Admin
                            </div>	
                        </div>       
            <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{Auth::guard('admin')->user()->name}}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('admin.logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                        </div>
                    </div>
                </nav>
            </div>
		</div>
        <!-- Header end ti-comment-alt -->

        <!-- Sidebar start -->
        @include('admin.sidebar.sidebar')
		<!-- Sidebar end -->
        
		<!-- Content body start -->
        @yield('contente')
        <!-- Content body end -->

        <!-- Footer start -->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="" target="_blank">Amani&Nada</a> 2023</p>
            </div>
        </div>
        <!-- Footer end -->
	</div>
    <!-- Main wrapper end -->

    <!-- Scripts -->
    <!-- Required vendors -->
    <script src="{{URL::to('assets/vendor/global/global.min.js')}}"></script>
	<script src="{{URL::to('assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{URL::to('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
	<!-- Apex Chart -->

	<!-- Datatable -->
	<script src="{{URL::to('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::to('assets/js/plugins-init/datatables.init.js')}}"></script>

	<script src="{{URL::to('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

	<script src="{{URL::to('assets/vendor/apexchart/apexchart.js')}}"></script>
	<script src="{{URL::to('assets/vendor/nouislider/nouislider.min.js')}}"></script>
	<script src="{{URL::to('assets/vendor/wnumb/wNumb.js')}}"></script>
    <script src="{{URL::to('assets/js/custom.min.js')}}"></script>
	<script src="{{URL::to('assets/js/dlabnav-init.js')}}"></script>
	<script src="{{URL::to('assets/js/demo.js')}}"></script>
    <script src="{{URL::to('assets/js/styleSwitcher.js')}}"></script>
	@yield('script')
</body>
</html>
