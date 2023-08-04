@extends('layouts.guest')
@php($section = config('portfolio.sections.'.$sectionKey))
@section('title', $section['label'])
@section('breadcrumb', $section['label'])
@section('contente')
<div class="page-heading heading-with-action"><div><p class="eyebrow">YOUR PORTFOLIO, PIECE BY PIECE</p><h1>{{ $section['label'] }}<span class="heading-count">{{ $records->count() }}</span></h1><p class="page-description">{{ $section['description'] }}</p></div><a class="button button-dark" href="{{ route('dashboard.'.$section['route'].'.create') }}"><x-studio-icon name="plus"/>Add entry</a></div>
@if($records->isEmpty())
    <section class="empty-panel"><span class="empty-symbol"><x-studio-icon :name="$section['icon']"/></span><h2>A blank canvas. A good place to start.</h2><p>Add your first {{ strtolower($section['label']) }} entry.<br>It will appear in every template, ready to make your own.</p><a class="button button-dark" href="{{ route('dashboard.'.$section['route'].'.create') }}"><x-studio-icon name="plus"/>Create your first entry</a></section>
@else
    <div class="record-grid">
    @foreach($records as $record)
        <article class="record-card">
            @php($image = $record->small_image ?? $record->image ?? null)
            @if($image)<img class="record-cover" src="{{ asset($image) }}" width="600" height="340" alt="{{ $record->{$section['title']} }}" loading="lazy">@endif
            <div class="record-content"><span class="record-eyebrow">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }} / {{ $section['label'] }}</span><h2>{{ $record->{$section['title']} }}</h2>
            @foreach($section['fields'] as $field => $options)
                @if($field === $section['title'] || in_array($options['type'] ?? 'text', ['file', 'hidden'])) @continue @endif
                @if($field === 'description')<p class="record-description">{{ \Illuminate\Support\Str::limit($record->{$field}, 240) }}</p>@else<dl class="record-detail"><dt>{{ $options['label'] }}</dt><dd>{{ $record->{$field} }}</dd></dl>@endif
            @endforeach
            <div class="record-actions"><a class="button button-light button-small" href="{{ route('dashboard.'.$section['route'].'.edit', $record->id) }}"><x-studio-icon name="edit"/>Edit entry</a><form method="POST" action="{{ route('dashboard.'.$section['route'].'.destroy', $record->id) }}" data-confirm="Delete this entry from your portfolio? This cannot be undone.">@csrf @method('DELETE')<button class="icon-button danger" type="submit" aria-label="Delete {{ $record->{$section['title']} }}"><x-studio-icon name="trash"/></button></form></div></div>
        </article>
    @endforeach
    </div>
@endif
@endsection
