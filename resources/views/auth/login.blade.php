@extends('layouts.app')

@section('title', 'Login')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')

<div class="auth-page">
    <div class="auth-card">

        <div class="auth-header">
            <img src="{{ asset('images/pinkcafe_logo.jpg') }}" alt="Pink Cafe" class="auth-logo">
            <h1>Bine ai revenit!</h1>
            <p>Conectează-te la contul tău</p>
        </div>

        @if($errors->any())
            <div class="auth-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login" class="auth-form">
            @csrf

            <div class="auth-field">
                <label>📧 Email</label>
                <input
                    type="email"
                    name="email"
                    placeholder="email@exemplu.com"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <div class="auth-field">
                <label>🔒 Parolă</label>
                <input
                    type="password"
                    name="password"
                    placeholder="Parola ta"
                    required
                >
            </div>

            <button type="submit" class="auth-btn">
                Conectează-te
            </button>

        </form>

        <p class="auth-switch">
            Nu ai cont?
            <a href="{{ route('register') }}">Înregistrează-te</a>
        </p>

    </div>
</div>

@endsection