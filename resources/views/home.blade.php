@extends('layouts.app')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        body { 
            background: transparent;
        }
    </style>
@endsection

@section('content')

    {{-- HERO SECTION --}}
    <section class="hero">
        <div class="hero-content">
            <img src="{{ asset('images/pinkcafe_logo.jpg') }}" alt="Pink Cafe Logo" class="hero-logo">
            <h1 class="hero-title">PINK CAFÉ</h1>
            <p class="hero-subtitle">Locul unde se întâlnește stilul modern cu deserturile unice și delicioase</p>
            <div class="hero-buttons">
                <a href="{{ route('meniu') }}" class="btn-glass">
                    <span>☕</span> Vezi Meniul
                </a>
                <a href="{{ route('comanda') }}" class="btn-pink">
                    <span>🛒</span> Comandă Online
                </a>
            </div>
        </div>
    </section>

    {{-- GALERIE SECTION --}}
    <section class="gallery">
        <h2 class="section-title">Galeria Noastră</h2>
        <div class="gallery-grid">
            <div class="gallery-card">
                <img src="{{ asset('images/interior1.jpg') }}" alt="Pink Cafe Interior">
            </div>
            <div class="gallery-card">
                <img src="{{ asset('images/interior2.jpg') }}" alt="Pink Cafe Ambiance">
            </div>
            <div class="gallery-card">
                <img src="{{ asset('images/interior3.jpg') }}" alt="Pink Cafe Space">
            </div>
        </div>
    </section>

    {{-- DE CE PINK CAFÉ SECTION --}}
    <section class="why-us">
        <h2 class="section-title">De ce PINK CAFÉ?</h2>
        <div class="why-grid">

            <div class="why-card">
                <div class="why-icon" style="background: linear-gradient(135deg, #e91e8c, #f06292)">
                    ☕
                </div>
                <h3>Cafea de Calitate Superioară</h3>
                <p>Folosim doar boabe de cafea premium, prăjite proaspăt și preparate de barista profesioniști. Fiecare ceașcă este o experiență unică.</p>
            </div>

            <div class="why-card">
                <div class="why-icon" style="background: linear-gradient(135deg, #9c27b0, #e91e8c)">
                    ✨
                </div>
                <h3>Deserturi Unice și Delicioase</h3>
                <p>Prăjituri artizanale, mochi japoneze și creații dulci exclusiviste preparate zilnic din ingrediente de calitate înaltă.</p>
            </div>

            <div class="why-card">
                <div class="why-icon" style="background: linear-gradient(135deg, #7b1fa2, #9c27b0)">
                    👥
                </div>
                <h3>Atmosferă Plăcută și Relaxantă</h3>
                <p>Design modern, spațiu confortabil și muzică ambientală creează locul perfect pentru întâlniri cu prietenii sau lucru în liniște.</p>
            </div>

        </div>
    </section>

@endsection