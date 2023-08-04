@extends('layouts.guest')
@php
    $section = config('portfolio.sections.'.$sectionKey);
    $record = $record ?? null;
    $editing = $record !== null;
    $routePrefix = 'dashboard.'.$section['route'];
@endphp
@section('title', ($editing ? 'Edit ' : 'Add ').$section['label'])
@section('breadcrumb', $section['label'])
@section('contente')
<a class="back-link" href="{{ route($routePrefix.'.list') }}"><x-studio-icon name="arrow-left"/>Back to {{ strtolower($section['label']) }}</a>
<div class="page-heading"><p class="eyebrow">YOUR STORY, IN YOUR WORDS</p><h1>{{ $editing ? 'Make it even better.' : 'Add a little more you.' }}</h1><p class="page-description">{{ $section['description'] }}</p></div>
<form class="editor-panel" action="{{ $editing ? route($routePrefix.'.update', $record->id) : route($routePrefix.'.store') }}" method="POST" enctype="multipart/form-data" data-save-form>
    @csrf
    <div class="editor-heading"><span class="tile-icon"><x-studio-icon :name="$section['icon']"/></span><div><h2>{{ $section['label'] }}</h2><p>{{ $editing ? 'Your current details, ready for a fresh edit.' : 'Fill in the details below to add a new entry.' }}</p></div></div>
    <div class="form-grid">
    @foreach($section['fields'] as $field => $options)
        @php($type = $options['type'] ?? 'text')
        @php($value = old($field, $record?->{$field} ?? $options['default'] ?? ''))
        @if($type === 'hidden')<input type="hidden" name="{{ $field }}" value="{{ $value }}">@continue @endif
        <div class="field {{ in_array($type, ['textarea', 'file']) ? 'field-wide' : '' }}">
            <label for="field-{{ $field }}">{{ $options['label'] }}@if($type !== 'file' || !$editing)<span class="required-marker" aria-hidden="true">*</span>@endif</label>
            @if($type === 'file')
                <div class="upload-field">
                    @if($record?->{$field})<img class="upload-preview" src="{{ asset($record->{$field}) }}" alt="Current {{ strtolower($options['label']) }}" width="160" height="120">@else<span class="upload-symbol"><x-studio-icon name="plus"/></span>@endif
                    <div><input id="field-{{ $field }}" name="{{ $field }}" type="file" accept="image/jpeg,image/png,image/webp" @if(!$editing) required @endif @if($errors->has($field)) aria-invalid="true" @endif aria-describedby="help-{{ $field }}{{ $errors->has($field) ? ' error-'.$field : '' }}" data-image-input><p id="help-{{ $field }}" class="field-help">{{ $options['help'] }}{{ $editing ? ' Leave empty to keep your current image.' : '' }}</p></div>
                </div>
            @elseif($type === 'textarea')
                <textarea id="field-{{ $field }}" name="{{ $field }}" rows="5" maxlength="5000" required placeholder="{{ $options['placeholder'] ?? '' }}" @if($errors->has($field)) aria-invalid="true" aria-describedby="error-{{ $field }}" @endif>{{ $value }}</textarea>
            @else
                <input id="field-{{ $field }}" name="{{ $field }}" type="text" value="{{ $value }}" required maxlength="{{ $field === 'lien' ? 2048 : 255 }}" placeholder="{{ $options['placeholder'] ?? '' }}" @if($errors->has($field)) aria-invalid="true" @endif @if(isset($options['help']) || $errors->has($field)) aria-describedby="{{ isset($options['help']) ? 'help-'.$field : '' }} {{ $errors->has($field) ? 'error-'.$field : '' }}" @endif>
                @if(isset($options['help']))<p class="field-help" id="help-{{ $field }}">{{ $options['help'] }}</p>@endif
            @endif
            @error($field)<p class="field-error" id="error-{{ $field }}">{{ $message }}</p>@enderror
        </div>
    @endforeach
    </div>
    <div class="form-footer"><span class="field-help">Required fields are marked with an asterisk.</span><div><a class="button button-light" href="{{ route($routePrefix.'.list') }}">Cancel</a><button class="button button-dark" type="submit"><x-studio-icon name="check"/>{{ $editing ? 'Save changes' : 'Add to portfolio' }}</button></div></div>
</form>
@endsection
