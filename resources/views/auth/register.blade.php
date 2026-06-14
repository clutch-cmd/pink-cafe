@extends('layouts.app')

@section('title', 'Register')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')

<div class="auth-page">
    <div class="auth-card">

        <div class="auth-header">
            
            <p>Înregistrează-te pentru a comanda online</p>
        </div>

        @if($errors->any())
            <div class="auth-error">
                <i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/register" class="auth-form">
            @csrf

            <div class="auth-field">
                <label><i class="fa-solid fa-user"></i> Nume complet</label>
                <input
                    type="text"
                    name="name"
                    placeholder="Numele tău"
                    value="{{ old('name') }}"
                    required
                >
            </div>

            <div class="auth-field">
                <label><i class="fa-solid fa-envelope"></i> Email</label>
                <input
                    type="email"
                    name="email"
                    placeholder="email@exemplu.com"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <div class="auth-field">
                <label><i class="fa-solid fa-lock"></i> Parolă</label>
                <input
                    type="password"
                    name="password"
                    placeholder="Minim 6 caractere"
                    required
                >
            </div>

            <div class="auth-field">
                <label><i class="fa-solid fa-shield-halved"></i> Confirmă parola</label>
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Repetă parola"
                    required
                >
            </div>

            <button type="submit" class="auth-btn">
                Înregistrează-te
            </button>

        </form>

        <p class="auth-switch">
            Ai deja cont?
            <a href="{{ route('login') }}">Conectează-te</a>
        </p>

    </div>
</div>

@endsection