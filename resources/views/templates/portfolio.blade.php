<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ \Illuminate\Support\Str::limit($profile?->description ?: $name.' — '.$role, 160) }}">
    <title>{{ $name }} · {{ $design['name'] }}</title>
    <link rel="icon" href="{{ asset('images/folio-mark.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>
<body class="portfolio theme-{{ $design['slug'] }}">
<a class="skip-link" href="#portfolio-main">Skip to content</a>
<div class="preview-toolbar"><a class="preview-back" href="{{ route('dashboard') }}"><x-studio-icon name="arrow-left"/><span>Back to studio</span></a><details class="look-switcher"><summary>{{ $design['name'] }}<span>{{ $preview ? 'Preview' : 'Your portfolio' }}</span><span aria-hidden="true">⌄</span></summary><nav aria-label="Try another template">@foreach(\App\Models\Template::catalog() as $id => $look)<a href="{{ route('templates.preview', $id) }}" @if($id === $templateId) aria-current="page" @endif>{{ $look['name'] }}<small>{{ $look['category'] }}</small></a>@endforeach</nav></details><form method="POST" action="{{ route('dashboard.selectTemplate') }}">@csrf<input type="hidden" name="template_id" value="{{ $templateId }}"><button class="preview-use" @if((int)auth()->user()->page?->templates_id === $templateId) disabled @endif>{{ (int)auth()->user()->page?->templates_id === $templateId ? 'Current template' : 'Use this template' }}<x-studio-icon name="check"/></button></form></div>
<div class="portfolio-frame">
<header class="portfolio-nav"><a class="portfolio-brand" href="#home">{{ $name }}<span class="brand-period">.</span></a><nav aria-label="Portfolio navigation">@if($sections['projects']->isNotEmpty())<a href="#work">Work</a>@endif<a href="#about">About</a><a href="#contact">Contact <x-studio-icon name="arrow-up-right"/></a></nav></header>
<main id="portfolio-main">
@include('templates.designs.'.$design['slug'])
</main>
<footer id="contact" class="portfolio-contact"><div><p class="section-kicker">THE NEXT GOOD THING STARTS HERE</p><h2>Let's make<br><span>something matter.</span></h2></div><div class="contact-links">@forelse($sections['contact'] as $link)@php($safeLink = preg_match('/^(https?:\/\/|mailto:|tel:)[^\s]+$/i', $link->lien))@if($safeLink)<a href="{{ $link->lien }}" @if(preg_match('/^https?:/i', $link->lien)) target="_blank" rel="noopener noreferrer" @endif>{{ $link->name }}<x-studio-icon name="arrow-up-right"/></a>@else<span>{{ $link->name }}</span>@endif @empty<p class="contact-coming">Contact details coming soon.</p>@endforelse</div></footer>
<div class="portfolio-colophon"><span>© {{ date('Y') }} {{ $name }}</span><a href="#home">Back to top <x-studio-icon name="arrow-up-right"/></a><span>Made with Folio</span></div>
</div>
</body>
</html>
