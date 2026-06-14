@extends('layouts.app')

@section('title', 'Login')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')

<div class="auth-page">
    <div class="auth-card">

        <div class="auth-header">
            
            <h1>Bine ai revenit!</h1>
            <p>Conectează-te la contul tău</p>
        </div>

        @if($errors->any())
            <div class="auth-error">
                {{ $errors->first() }}
            </div>
        @endif
        @if (session('status'))
            <div style="background: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; text-align: center; font-size: 0.9rem;">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="/login" class="auth-form">
            @csrf

            <div class="auth-field">
                <label><i class="fa-solid fa-envelope" ></i> Email</label>
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
                    placeholder="Parola ta"
                    required
                >
            </div>
            <div style="text-align: right; margin-top: -10px;" class="auth-switch">
            <a href="{{ route('password.request') }}" style="font-size: 0.8rem; color: #e91e8c; text-decoration: none;">
                Ai uitat parola?
            </a>
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