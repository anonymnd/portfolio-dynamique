@extends('layouts.app')
@section('title', 'Make it yours')
@section('content')
<p class="eyebrow">GOOD THINGS START HERE</p><h2>Make it yours.</h2><p class="auth-intro">Your own little corner of the internet, starting now.</p><form method="POST" action="{{ route('register') }}">@csrf
@foreach(['name' => ['Full name', 'text', 'name', 'What should we call you?'], 'email' => ['Email address', 'email', 'username', 'you@example.com'], 'password' => ['Password', 'password', 'new-password', 'At least 8 characters'], 'password_confirmation' => ['Confirm password', 'password', 'new-password', 'One more time']] as $field => [$label, $type, $autocomplete, $placeholder])
<div class="field"><label for="{{ $field }}">{{ $label }}</label><input id="{{ $field }}" type="{{ $type }}" name="{{ $field }}" @if($type !== 'password') value="{{ old($field) }}" @endif autocomplete="{{ $autocomplete }}" required @if($type === 'password') minlength="8" @else maxlength="255" @endif placeholder="{{ $placeholder }}" @if($errors->has($field)) aria-invalid="true" aria-describedby="error-{{ $field }}" @endif>@error($field)<p class="field-error" id="error-{{ $field }}">{{ $message }}</p>@enderror</div>
@endforeach<button type="submit" class="button button-dark">Create your studio<x-studio-icon name="arrow-right"/></button></form><p class="auth-switch">Already have a home here? <a href="{{ route('login') }}">Sign in</a></p>
@endsection
