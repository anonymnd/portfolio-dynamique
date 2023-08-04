<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    <img src={{ asset('assets/images/image.png') }} width="20" alt="">
                    <div class="header-info ms-3">
                        <span class="font-w600">Hi, <b>{{ Auth::user()->name }}</b></span>
                        <small class="text-end font-w400">({{ Auth::user()->email }})</small>
                    </div>
                </a>
            </li>

            <li>
            <a>
                <i class="fa-solid fa-barcode"></i>
                <span class="nav-text">The Composants</span>
            </a>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fas fa-eject"></i>
                <span class="nav-text">About Me</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('dashboard.aboutme.create') }}">Create</a></li>
                <li><a href="{{ route('dashboard.aboutme.list') }}">List</a></li>
            </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fas fa-language"></i>
                <span class="nav-text">Languages</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('dashboard.languages.create') }}" >Create</a></li>
                <li><a href="{{ route('dashboard.languages.list') }}">List</a></li>
            </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fa-solid fa-align-center"></i>
                <span class="nav-text">Hobbies</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('dashboard.hobbies.create') }}">Create</a></li>
                <li><a href="{{ route('dashboard.hobbies.list') }}">List</a></li>
            </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fas fa-laptop-file"></i>
                <span class="nav-text">Skills</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('dashboard.skills.create') }}">Create</a></li>
                <li><a href="{{ route('dashboard.skills.list') }}">List</a></li>
            </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fas fa-school"></i>
                <span class="nav-text">Education</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('dashboard.education.create') }}">Create</a></li>
                <li><a href="{{ route('dashboard.education.list') }}">List</a></li>
            </ul>
            </li>
            
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fas fa-business-time"></i>
                <span class="nav-text">Experience</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('dashboard.experience.create') }}">Create</a></li>
                <li><a href="{{ route('dashboard.experience.list') }}">List</a></li>
            </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fas fa-columns"></i>
                <span class="nav-text">Services</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('dashboard.services.create') }}">Create</a></li>
                <li><a href="{{ route('dashboard.services.list') }}">List</a></li>
            </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fas fa-images"></i>
                <span class="nav-text">Projects</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('dashboard.projects.create') }}">Create</a></li>
                <li><a href="{{ route('dashboard.projects.list') }}">List</a></li>
            </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fas fa-address-book"></i>
                <span class="nav-text">Contacts</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('dashboard.contacts.create') }}">Create</a></li>
                <li><a href="{{ route('dashboard.contacts.list') }}">List</a></li>
            </ul>
            </li>
        </ul>
    </div>
</div>
