@extends('layouts.app')

@section('title', 'Contacte')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/contacte.css') }}">
@endsection

@section('content')

<div class="contacte-page">

    <div class="contacte-header">
        <h1>Contacte</h1>
        <p>Te așteptăm cu drag la Pink Cafe!</p>
    </div>

    <div class="contacte-grid">

        <div class="contacte-card">
            <div class="contacte-card-icon">📞</div>
            <h3>Telefon</h3>
            <a href="tel:079043047" class="contacte-phone">0790 43 047</a>
        </div>

        <div class="contacte-card">
            <div class="contacte-card-icon">📍</div>
            <h3>Adresă</h3>
            <p>Cahul, MD</p>
            <p>Calea Republicii 24a, nr. 4</p>
        </div>

        <div class="contacte-card">
            <div class="contacte-card-icon">🕐</div>
            <h3>Program</h3>
            <p>Luni - Duminică</p>
            <p class="contacte-hours">07:00 - 22:00</p>
        </div>

        <div class="contacte-card contacte-card-social">
            <div class="contacte-card-icon">📱</div>
            <h3>Social Media</h3>
            <a href="https://instagram.com/pink_cafe_cahul" target="_blank" class="social-link">
                <span>📸</span> @pink_cafe_cahul
            </a>
            <a href="https://tiktok.com/@pink_cafe_cahul" target="_blank" class="social-link">
                <span>🎵</span> @pink_cafe_cahul
            </a>
        </div>

    </div>

    <div class="contacte-info-box">
        <h2>Ne găsești aici!</h2>
        <p>Pink Cafe este locul perfect pentru a savura o cafea delicioasă, a te bucura de deserturi unice sau a petrece timp de calitate cu prietenii.</p>
        <div class="contacte-tags">
            <span class="tag">Cafea de specialitate</span>
            <span class="tag">Deserturi fresh</span>
            <span class="tag">Bauturi racoritoare</span>
            <span class="tag">Atmosferă relaxantă</span>
        </div>
    </div>

</div>

@endsection