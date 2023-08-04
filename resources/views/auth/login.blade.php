@extends('layouts.app')
@section('title', 'Welcome back')
@section('content')
<p class="eyebrow">YOUR CREATIVE SPACE AWAITS</p><h2>Welcome back.</h2><p class="auth-intro">Let's make something that feels like you.</p>
@if(session('status'))<div class="notice notice-success" role="status">{{ session('status') }}</div>@endif
<form method="POST" action="{{ route('login') }}">@csrf
<div class="field"><label for="email">Email address</label><input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="you@example.com" @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>@error('email')<p id="email-error" class="field-error">{{ $message }}</p>@enderror</div>
<div class="field"><label for="password">Password</label><input type="password" id="password" name="password" required autocomplete="current-password" placeholder="Your password" @error('password') aria-invalid="true" aria-describedby="password-error" @enderror>@error('password')<p id="password-error" class="field-error">{{ $message }}</p>@enderror</div>
<div class="auth-options"><label class="checkbox-label"><input type="checkbox" name="remember" @checked(old('remember'))>Remember me</label><a href="{{ route('password.request') }}">Forgot password?</a></div><button type="submit" class="button button-dark">Enter your studio <x-studio-icon name="arrow-right"/></button>
</form><p class="auth-switch">New here? <a href="{{ route('register') }}">Create an account</a></p>
@endsection
