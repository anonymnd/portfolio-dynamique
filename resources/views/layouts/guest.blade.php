<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Your studio') · Folio</title>
    <link rel="icon" href="{{ asset('images/folio-mark.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/studio.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/studio.js') }}" defer></script>
</head>
<body class="studio-body">
    <a class="skip-link" href="#main-content">Skip to content</a>
    <aside class="studio-sidebar" id="studio-sidebar">
        <a class="brand" href="{{ route('dashboard') }}"><span class="brand-mark">f.</span>folio<span class="brand-dot">®</span></a>
        <p class="sidebar-eyebrow">YOUR CREATIVE SPACE</p>
        <nav aria-label="Studio navigation">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'is-active' : '' }}" href="{{ route('dashboard') }}" @if(request()->routeIs('dashboard')) aria-current="page" @endif><x-studio-icon name="layout"/>Templates<span class="nav-count">5</span></a>
            <p class="nav-label">YOUR CONTENT</p>
            @foreach(config('portfolio.sections') as $key => $section)
                <a class="nav-link {{ request()->is('dashboard/'.$key.'/*') ? 'is-active' : '' }}" href="{{ route('dashboard.'.$section['route'].'.list') }}" @if(request()->is('dashboard/'.$key.'/*')) aria-current="page" @endif><x-studio-icon :name="$section['icon']"/>{{ $section['label'] }}</a>
            @endforeach
            <p class="nav-label">SETTINGS</p>
            <a class="nav-link {{ request()->routeIs('profile.*') ? 'is-active' : '' }}" href="{{ route('profile.edit') }}"><x-studio-icon name="settings"/>Account</a>
        </nav>
        <div class="sidebar-note"><span class="little-star" aria-hidden="true"><x-studio-icon name="spark"/></span><strong>Made to be yours.</strong><p>Five looks. One story.<br>Make something you love.</p></div>
        <div class="sidebar-account"><span class="avatar">{{ mb_substr(auth()->user()->name, 0, 1) }}</span><span class="account-copy"><strong>{{ auth()->user()->name }}</strong><small>Your personal studio</small></span><form action="{{ route('logout') }}" method="POST">@csrf<button class="icon-button" type="submit" aria-label="Log out"><x-studio-icon name="logout"/></button></form></div>
    </aside>
    <div class="studio-workspace">
        <header class="studio-topbar"><div class="topbar-left"><button class="icon-button mobile-menu" type="button" aria-label="Open navigation" aria-controls="studio-sidebar" aria-expanded="false" data-menu-toggle><x-studio-icon name="menu"/></button><span>Workspace <span class="breadcrumb-slash">/</span> <strong>@yield('breadcrumb', 'Templates')</strong></span></div><a class="button button-dark button-small" href="{{ route('templates.result') }}"><x-studio-icon name="arrow-up-right"/>View portfolio</a></header>
        <main id="main-content" class="studio-main">
            @php($statusMessage = match(session('status')) { 'profile-updated' => 'Your account details are up to date.', 'password-updated' => 'Your password has been updated.', default => session('status') })
            @if(session('success') || $statusMessage)<div class="notice notice-success" role="status"><x-studio-icon name="check"/>{{ session('success') ?: $statusMessage }}</div>@endif
            @if($errors->any())<div class="notice notice-error" role="alert" tabindex="-1"><strong>A few things need your attention.</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
            @yield('contente')
        </main>
        <footer class="studio-footer"><span>Folio Studio</span><span>A place for your best work.</span></footer>
    </div>
</body>
</html>
