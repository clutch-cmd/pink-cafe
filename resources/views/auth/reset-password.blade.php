@extends('layouts.app')

@section('title', 'Resetare Parolă')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="auth-page">
    <div class="auth-card">
        <div class="auth-header">
            <h1>Setează o nouă parolă</h1>
            <p>Introdu noua ta parolă mai jos pentru a o schimba.</p>
        </div>
        @if ($errors->any())
            <div class="auth-error">
                <ul style="list-style: none; padding: 0; margin: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('password.store') }}" class="auth-form">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="auth-field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required readonly>
            </div>

            <div class="auth-field">
                <label for="password">Noua parolă</label>
                <input id="password" type="password" name="password" required autofocus>
            </div>

            <div class="auth-field">
                <label for="password_confirmation">Confirmă noua parolă</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="auth-btn">
                Salvează noua parolă
            </button>
        </form>
    </div>
</div>

@endsection