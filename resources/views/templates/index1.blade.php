<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="{{asset('assets/images/logoo-removebg-preview.png')}}" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#aboutme">About Me</a></li>
                        <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
                        <li class="nav-item"><a class="nav-link" href="#languages">languages</a></li>

                        <li class="nav-item"><a class="nav-link" href="#education">Education</a></li>
                        <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Projects</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->

        <header class="masthead" style="background-image: url('{{ $aboutme->first() ? url($aboutme->first()->image) : asset('assets/images/bg_1.jpg') }}');">

            <div class="container">
                <div class="masthead-subheading">Welcome to My Portfolio!!</div>
                <div class="masthead-heading text-uppercase">IT'S NICE TO MEET YOU</div>
            </div>
        </header>

        <!--About_Me-->

        <section class="page-section about" id="aboutme">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About Me</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                @foreach ($aboutme as $aboutme)
                <div class="about_description">
                    <h3 class="hello">Hello, my name is <span class="name">{{$aboutme->full_name}} </span></h3>
                    <h3 class="my-profession">I'm a <span class="typing">{{$aboutme->job}} </span></h3>
                    <p>{{$aboutme->description}} </p>
                </div>
                <div class=" text-center personal-info">
                    <div class="left-div">
                            <p class="trait">Age : </p>
                            <p> <span>{{$aboutme->birthday}} </span></p>
                    </div>
                    <div class="right-div abc">
                        <p class="trait">City : </p>
                        <p><span>{{$aboutme->city}} </span></p>
                    </div>
                </div>



                @endforeach
            </div>
        </section>



        <!--Skills-->
        <section class="page-section skills bg-light" id="skills">
            <div class="container">
                <div class="text-center">
                    <h2 class="skill section-heading text-uppercase">Skills</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="skills-data">
                    <p class="skills-description">
                        See full what skills I have and perform,
                        to develop the projects for you.
                    </p>
                    <a href="#portfolio" class="btn btn-primary button">See Projects</a>
                </div>
                <div class="skill-row">
                    @if (count($skills)> 0)
                        @foreach ($skills as $skill)

                        <div class="skill-box">
                            <div class="skill-info">
                                <h2>{{$skill->name}}</h2>
                                <h2>{{$skill->level}}</h2>
                            </div>
                            <div class="skill-outter-line">
                                <div class="skill-inner-line" style="width: {{$skill->level}};"></div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </section>
        <!-- Languages -->
        <section class="page-section skills bg-light" id="languages">
            <div class="container">
                <div class="text-center">
                    <h2 class="skill section-heading text-uppercase">languages</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="skills-data">
                    <p class="skills-description">
                        See full  languages I spoke,

                    </p>
                </div>
                <div class="skill-row">
                    @if (count($language)> 0)
                        @foreach ($language as $language)

                        <div class="skill-box">
                            <div class="skill-info">
                                <h2>{{$language->language_name}}</h2>
                                <h2>{{$language->level}}</h2>
                            </div>
                            <div class="skill-outter-line">
                                <div class="skill-inner-line" style="width: {{$language->level}};"></div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </section>




        {{-- Education --}}
    <section class="page-section education" id="education">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Education</h2>
            <h3 class="section-subheading text-muted"></h3>
        </div>
        <ul class="timeline">
            @if (count($education)> 0)
                @foreach ($education as $education)
                    <li>
                        <div class="timeline-image"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>{{$education->date}}</h4>
                                <h4 class="subheading">{{$education->title}}</h4>
                                <h4>{{ $education->place }}</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">{{$education->description}}</p></div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    </section>

        <!-- Experience-->
        <section class="page-section exp bg-light" id="experience">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Experience</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <ul class="timeline">
                    @if (count($experiences)> 0)
                        @foreach ($experiences as $experience)
                    <li class="timeline-inverted">
                        <div class="timeline-image"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>{{$experience->date}}</h4>
                                <h4 class="subheading">{{$experience->title}}</h4>
                                <h4>{{$experience->place}}</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">{{$experience->description}}</p></div>
                        </div>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </section>

        <!-- Services-->
        <section class="page-section service" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row text-center">
                    @if(count($services) > 0)
                        @foreach ($services as $service)
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="<?php echo $service->icon?> fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">{{$service->title}}</h4>
                            <p class="text-muted">{{$service->description}}</p>
                        </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </section>

        <!-- Projects Grid-->
        <section class="page-section project bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Projects</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row">
                    @if (count($projects) > 0)
                        @foreach($projects as $project)
                        <div class="col-lg-4 col-sm-6 mb-4">

                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $project->id?>">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="{{url($project->small_image)}}" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">{{$project->client}}</div>
                                    <div class="portfolio-caption-subheading text-muted">{{$project->category}}</div>
                                </div>
                             </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>

        <!-- Contact-->
        <section class="page-section exp" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Me</h2>
                </div>
                <h3 class="contact-title">Have You Any Questions ?</h3>
                <h4 class="contact-sub-title">I'M AT YOUR SERVICES</h4>

                <style>
                    /*contact*/
                    .contact-title {
                    padding-top: 50px;
                    color: var(--bs-primary);
                    text-align: center;
                    font-size: 25px;
                    font-family: var(--bs-font-monospace);
                    margin-bottom: 20px;
                    }

                    .contact-sub-title {
                    color: var(--bs-white);
                    text-align: center;
                    font-size: 15px;
                    margin-bottom: 60px;
                    }


                    .rows {
                    display: flex;
                    flex-wrap: wrap;
                    margin-left: -15px;
                    margin-right: -15px;
                    position: relative;
                    }
                    .contact-info-item {
                    flex: 0 0 25%;
                    max-width: 25%;
                    text-align: center;
                    margin-bottom: 60px;
                    }
                    .contact-info-item .icon {
                    display: inline-block;
                    color: var(--bs-yellow);
                    }
                    .contact-info-item .icon .fa {
                    font-size: 35px;
                    }


                    .rows .contact-info-item h4 {
                    font-size: 18px;
                    font-weight: 700;
                    color: var(--bs-white);
                    text-transform: capitalize;
                    margin: 15px 0 5px;
                    }
                    .rows .contact-info-item p {
                    font-size: 18px;
                    font-weight: 700;
                    color: var(--bs-yellow);
                    text-transform: capitalize;
                    margin: 15px 0 5px;
                    }

                </style>
                <div class="rows">
                    @if (count($contact) > 0)
                        @foreach($contact as $contact)
                    <!--Contact Info item Start-->
                    <div class="contact-info-item">
                        <div class="icon"><i class="{{ $contact->icon }}"></i></div>
                        <h4><a href="{{ $contact->lien }}" target="_blank">{{ $contact->name }}</a></h4>
                    </div>
                    <!--Contact Info item End-->
                    @endforeach
                    @endif
                </div>

            </div>
        </section>

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
         @if (count($projects) > 0)
                        @foreach($projects as $project)
        <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $project->id?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="{{asset('assets/img/close-icon.svg')}}" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">{{$project->title}}</h2>
                                    <p class="item-intro text-muted">{{$project->sub_title}}</p>
                                    <img class="img-fluid d-block mx-auto" src="{{url($project->big_image)}}" alt="..." />
                                    <p>{{$project->description}}</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:{{$project->client}}</strong>
                                        </li>
                                        <li>
                                            <strong>Category:{{$project->category}}</strong>
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        <!-- Portfolio item 2 modal popup-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="{{asset('js/scripts.js')}}"></script>

        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
         <!-- Third party plugin JS-->
         <!-- Contact form JS-->

    </body>
</html>
