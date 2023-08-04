<section class="portfolio-hero editorial-hero" id="home"><div class="editorial-meta"><span>THE PERSONAL EDITION</span><span>{{ $profile?->city ?: 'A COLLECTION OF WORK & IDEAS' }}</span><span>VOL. {{ date('Y') }}</span></div><h1>{{ $name }}</h1><div class="editorial-lead"><div><span class="editorial-number">01 / INTRODUCTION</span><p class="hero-role">{{ $role }}</p></div><p class="hero-description">{{ $profile?->description ? \Illuminate\Support\Str::limit($profile->description, 220) : 'Work, perspective, and the things that make me who I am.' }}</p><div class="editorial-portrait">@if($profile?->image)<img src="{{ asset($profile->image) }}" alt="Portrait of {{ $name }}" width="440" height="460">@else<span class="portrait-initial">{{ mb_substr($name, 0, 1) }}</span>@endif</div></div></section>
@include('templates.partials.work')
@include('templates.partials.about')
@include('templates.partials.journey')
@include('templates.partials.services')
