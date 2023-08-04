@extends('layouts.guest')
@section('title', 'Choose your look')
@section('contente')
@php
    $completed = collect($sectionCounts)->filter(fn($count) => $count > 0)->count();
    $catalog = \App\Models\Template::catalog();
@endphp
<section class="dashboard-intro"><div><p class="eyebrow"><span class="status-dot"></span> THE NEXT CHAPTER IS YOURS</p><h1>Your work. <span>Your way.</span></h1><p class="page-description">A home for everything you create. Pick a look that feels like you.</p></div><div class="intro-art" aria-hidden="true"><span class="art-square"></span><span class="art-ring"></span><span class="art-star"><x-studio-icon name="spark"/></span><span class="art-caption">make it yours.</span></div></section>
<section class="setup-banner" aria-label="Portfolio setup"><div class="progress-orbit" style="--progress: {{ round($completed / 9 * 100) }}%"><span>{{ $completed }}<small>/9</small></span></div><div class="setup-copy"><strong>{{ $completed === 9 ? 'Your story is taking shape.' : 'Great portfolios start with your story.' }}</strong><p>{{ $completed }} of 9 content sections filled in. Add a little more, or explore your look.</p></div><a class="button button-light" href="{{ $profile ? route('dashboard.aboutme.edit', $profile->id) : route('dashboard.aboutme.create') }}">{{ $profile ? 'Edit your introduction' : 'Introduce yourself' }}<x-studio-icon name="arrow-right"/></a></section>
<section aria-labelledby="template-heading"><div class="section-heading"><div><p class="eyebrow">THE COLLECTION</p><h2 id="template-heading">Find your signature look<span class="heading-count">05</span></h2></div><span class="muted-note">Same content. A whole new feeling.</span></div>
    <div class="filter-row" role="group" aria-label="Filter templates"><button class="filter-chip is-active" data-template-filter="all" aria-pressed="true">All templates <span>5</span></button>@foreach(['Minimal', 'Dark', 'Elegant', 'Creative', 'Developer'] as $category)<button class="filter-chip" data-template-filter="{{ $category }}" aria-pressed="false">{{ $category }}</button>@endforeach</div>
    <p class="sr-only" aria-live="polite" data-filter-status>All five templates shown.</p>
    <div class="template-grid">
    @foreach($templates as $template)
        @php($design = $catalog[$template->id])
        <article class="template-card {{ (int)$activeTemplate === $template->id ? 'is-selected' : '' }}" data-template-category="{{ $design['category'] }}">
            <a class="template-cover" href="{{ route('templates.preview', $template->id) }}" aria-label="Preview {{ $design['name'] }}"><img src="{{ asset('images/templates/'.$design['slug'].'.svg') }}" alt="{{ $design['name'] }} portfolio design" width="720" height="480" loading="lazy">@if((int)$activeTemplate === $template->id)<span class="selected-badge"><x-studio-icon name="check"/>Your current look</span>@else<span class="cover-preview">Explore this look <x-studio-icon name="arrow-up-right"/></span>@endif</a>
            <div class="template-info"><div class="template-name-row"><h3>{{ $design['name'] }}</h3><span class="design-category">{{ $design['category'] }}</span></div><p>{{ $design['tagline'] }}</p><div class="template-actions"><a class="text-link" href="{{ route('templates.preview', $template->id) }}">Live preview <x-studio-icon name="arrow-up-right"/></a><form method="POST" action="{{ route('dashboard.selectTemplate') }}">@csrf<input type="hidden" name="template_id" value="{{ $template->id }}"><button class="button button-small {{ (int)$activeTemplate === $template->id ? 'button-selected' : 'button-light' }}" @if((int)$activeTemplate === $template->id) disabled @endif>{{ (int)$activeTemplate === $template->id ? 'Selected' : 'Use template' }}</button></form></div></div>
        </article>
    @endforeach
    </div><p class="collection-note"><x-studio-icon name="shield"/>Switch whenever you like. Your projects, experience, and story stay intact.</p>
</section>
<section class="content-overview" aria-labelledby="content-heading"><div class="section-heading"><div><p class="eyebrow">THE STORY BEHIND THE STYLE</p><h2 id="content-heading">Bring your portfolio to life</h2></div></div><div class="content-overview-grid">@foreach(config('portfolio.sections') as $key => $section)<a href="{{ route('dashboard.'.$section['route'].'.list') }}" class="content-tile"><span class="tile-icon"><x-studio-icon :name="$section['icon']"/></span><span><strong>{{ $section['label'] }}</strong><small>{{ $sectionCounts[$key] ? $sectionCounts[$key].' '.($sectionCounts[$key] === 1 ? 'entry' : 'entries') : 'Add your first entry' }}</small></span><x-studio-icon name="arrow-right"/></a>@endforeach</div></section>
@endsection
