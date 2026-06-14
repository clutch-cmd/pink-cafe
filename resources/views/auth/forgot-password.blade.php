@extends('layouts.app')

@section('title', 'Forgot Password')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')

<div class="auth-page">
    <div class="auth-card">

        <div class="auth-header">
            
            <h1>Ai uitat parola?</h1>
            <p>Nu-ți face griji! Introdu adresa ta de email și îți vom trimite un link pentru a-ți reseta parola.</p>
        </div>

        @if($errors->any())
            <div class="auth-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
        @csrf
        
        <div class="auth-field">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <button type="submit" class="auth-btn" style="margin-top: 20px; width: 100%;">
            Trimite link resetare
        </button>
    </form>

        <p class="auth-switch">
            Nu ai cont?
            <a href="{{ route('register') }}">Înregistrează-te</a>
        </p>

    </div>
</div>

@endsection