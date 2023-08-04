<!DOCTYPE html>
<html lang="en">
<head>
	<title>IPortfolio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('css/animate.css')}}">

	<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

	<link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="#home-section">IPortfolio<span></span></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
					<li class="nav-item"><a href="#about-section" class="nav-link"><span>About Me</span></a></li>
					<li class="nav-item"><a href="#education-section" class="nav-link"><span>Education</span></a></li>
					<li class="nav-item"><a href="#experience-section" class="nav-link"><span>Experience</span></a></li>
					<li class="nav-item"><a href="#skills-section" class="nav-link"><span>Skills</span></a></li>
					<li class="nav-item"><a href="#services-section" class="nav-link"><span>Services</span></a></li>
					<li class="nav-item"><a href="#projects-section" class="nav-link"><span>Projects</span></a></li>
					<li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<section id="home-section" class="hero">
		<div class="home-slider owl-carousel">
			<div class="slider-item">
				<div class="overlay"></div>
				<div class="container-fluid px-md-0">
					<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
						@foreach ($aboutme as $item)
						<div class="one-third order-md-last img" style="background-image:url('{{ url($item->image) }}');">
							<div class="overlay"></div>
							<div class="overlay-1"></div>
						</div>
						<div class="one-forth d-flex  align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">
								<span class="subheading">Hello! This is {{$item->full_name}}</span>
								<h1 class="mb-4 mt-3">{{$item->job}}</h1>
								<p><a href="#contact-section" class="btn btn-primary">Hire me</a>
									</p>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>

			<div class="slider-item">
				<div class="overlay"></div>
				<div class="container-fluid px-md-0">
					<div class="row d-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
						@foreach ($aboutme as $item)
						<!-- <div class="one-third order-md-last img" style="background-image:'('{{ url($item->image) }}');"> -->
							<div class="overlay"></div>
							<div class="overlay-1"></div>
						</div>
						<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">
								<span class="subheading">Hello! This is {{$item->full_name}}</span>
								<h1 class="mb-4 mt-3">{{$item->job}}</h1>
								<p><a href="#contact-section" class="btn btn-primary">Hire me</a>
									</p>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>

<!--aboutme-->
	<section class="ftco-about ftco-section ftco-no-pt ftco-no-pb" id="about-section">
		<div class="container">
			<div class="row d-flex no-gutters">
					<div class="py-md-5">
						<div class="row justify-content-start pb-3">
							@foreach ($aboutme as $aboutme)
							<div class="col-md-12 heading-section ftco-animate">
								<span class="subheading">My Intro</span>
								<h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">About Me</h2>
								<p>{{$aboutme->description}} </p>

								<ul class="about-info mt-4 px-md-0 px-2">
									<li class="d-flex"><span>Date of birth:</span>{{$aboutme->birthday}} <span></span></li>
									<li class="d-flex"><span>City:</span>{{$aboutme->city}} <span></span></li>
								</ul>
							</div>
							@endforeach
							<div class="col-md-12">
								<ul class="about-info mt-0 px-md-0 px-2">
								    <li><span>Languages :</span></li>
							    </ul>
								<div class="my-interest d-lg-flex w-100">
									@foreach ($language as $language)
									<div class="interest-wrap d-flex align-items-center">
										<div class="text">{{$language->language_name}} :</div> <span>{{$language->level}}</span>
									</div>
									@endforeach
								</div>
							</div>
							<div class="col-md-12">
								<ul class="about-info mt-3 px-md-0 px-2">
								    <li><span>Center of Interest :</span></li>
							    </ul>
								<div class="my-interest d-lg-flex w-100">
									@foreach ($hobbie as $hobbie)
									<div class="interest-wrap d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="{{$hobbie->icon}}"></span>
										</div>
										<div class="text">{{$hobbie->name}}</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
			</div>
		</div>
	</section>



	<section class="ftco-hireme">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-md-8 col-lg-8 d-flex align-items-center">
					<div class="w-100 py-4">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--Education-->
	<section class="ftco-section bg-light" id="education-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 heading-section text-center ftco-animate mb-5">
					<h2 class="mb-4">Education</h2>
				</div>
			</div>

			<div class="row progress-circle mb-5">
				<div class="col-lg-4 mb-4">
					@if (count($education)> 0)
                    @foreach ($education as $education)
					<div class="bg-white rounded-lg shadow p-4">
						<h2 class="h5 font-weight-bold text-center mb-4"> {{$education->date}} </br> {{ $education->place }}</h2>
					    <h5 class="h4 font-weight-bold mb-0"> {{$education->title}}</h5>
						<p class="small text-gray"> {{$education->description}}</p>
					</div>
					@endforeach
           			@endif
				</div>
		    </div>
		</div>
	</section>


<!--Experience-->
	<section class="ftco-section " id="experience-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 heading-section text-center ftco-animate mb-5">
					<h2 class="mb-4">Experience</h2>
				</div>
			</div>

			<div class="row progress-circle mb-5">
				<div class="col-lg-4 mb-4">
					@if (count($experiences)> 0)
                    @foreach ($experiences as $experience)
					<div class="bg-white rounded-lg shadow p-4">
						<h2 class="h5 font-weight-bold text-center mb-4"> {{$experience->date}} </br> {{$experience->place}}</h2>
					    <h5 class="h4 font-weight-bold mb-0">{{$experience->title}}</h5>
						<p class="small text-gray">{{$experience->description}}</p>
					</div>
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</section>


	<section class="ftco-hireme">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-md-8 col-lg-8 d-flex align-items-center">
					<div class="w-100 py-4">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--Skill-->
	<section class="ftco-section bg-light" id="skills-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 heading-section text-center ftco-animate mb-5">
					<h2 class="mb-4">Skills</h2>
				</div>
			</div>
			<div class="row progress-circle mb-5">
				<div class="col-lg-4 mb-4">
					@if (count($skills)> 0)
                        @foreach ($skills as $skill)
					<div class="bg-white rounded-lg shadow p-4">
						<h2 class="h5 font-weight-bold text-center mb-4">{{$skill->name}}</h2>
						<div class="progress mx-auto" data-value='{{$skill->level}}'>
							<span class="progress-left">
								<span class="progress-bar border-primary"></span>
							</span>
							<span class="progress-right">
								<span class="progress-bar border-primary"></span>
							</span>
							<div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
								<div class="h2 font-weight-bold">{{$skill->level}}</div>
							</div>
						</div>
					</div>
					@endforeach
                    @endif
				</div>
			</div>
		</div>
	</section>


	<!--Services-->
	<section class="ftco-section" id="services-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 heading-section text-center ftco-animate mb-5">
					<h2 class="mb-4">Services</h2>
				</div>
			</div>

			<div class="row">
				@if(count($services) > 0)
				@foreach ($services as $service)
				<div class="col-md-6 col-lg-3">
					<div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
						<div class="icon shadow d-flex align-items-center justify-content-center"><span class="{{$service->icon}}"></span></div>
						<div class="media-body">
							<h3 class="heading mb-3">{{$service->title}}</h3>
							<p>{{$service->description}}</p>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</section>

	<section class="ftco-hireme">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-md-8 col-lg-8 d-flex align-items-center">
					<div class="w-100 py-4">
					</div>
				</div>
			</div>
		</div>
	</section>


	<!--Projects-->
	<section class="ftco-section ftco-project bg-light" id="projects-section">
		<div class="container-fluid px-md-4">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h2 class="mb-4">Projects</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					@if (count($projects) > 0)
					@foreach($projects as $project)
					<div class="project img shadow ftco-animate d-flex justify-content-center align-items-center" style="background-image: url('{{ url($project->big_image) }}');">
						<div class="overlay"></div>
						<div class="text text-center p-2">
							<h3><a href="#">{{$project->title}}</a></h3>
							<span>{{$project->sub_title}}</span>
							<p>{{$project->description}}</p>
							<p>Client: {{$project->client}} </p>
							<p>Category: {{$project->category}}</p>
						</div>
					</div>
					@endforeach
        			@endif
				</div>
			</div>
		</div>
	</section>


	<!--Contact-->
	<section class="ftco-counter contact-section" id="contact-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2 class="mb-4">Contact Me</h2>
					<h4>Have You Any Questions ?</h4>
					<span class="subheading">I'M AT YOUR SERVICES</span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 justify-content-center counter-wrap ftco-animate">
					@if (count($contact) > 0)
                        @foreach($contact as $contact)
					<div class="block-18 d-flex dbox w-100 ">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="{{ $contact->icon }}"></span>
						</div>
						<div class="text">
							<p><span><a href="{{ $contact->lien }}" target="_blank">{{ $contact->name }}</a></span></p>
						</div>
					</div>
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</section>

<section class="ftco-hireme">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-md-8 col-lg-8 d-flex align-items-center">
					<div class="w-100 py-4">
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer class="ftco-footer ftco-section">
		<div class="container">
				<div class="col-md-12 text-center">

					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy; 2023
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</footer>



		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
		<script src="{{asset('js/popper.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
		<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
		<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
		<script src="{{asset('js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
		<script src="{{asset('js/scrollax.min.js')}}"></script>

		<script src="{{asset('js/main.js')}}"></script>

	</body>
	</html>
