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
                    <i class="fa-solid fa-mug-saucer" style="color: rgb(255, 255, 255);"></i> Vezi Meniul
                </a>
                <a href="{{ route('comanda') }}" class="btn-pink">
                    <i class="fa-solid fa-cart-shopping" style="color: rgb(255, 255, 255);"></i> Comandă Online
                </a>
            </div>
        </div>
    </section>

    {{-- GALERIE SECTION --}}
    <section class="gallery">
        <h2 class="section-title">Galeria Noastră</h2>
        <div class="gallery-grid">
            <div class="gallery-card" onclick="openGalleryModal(this.querySelector('img').src)">
                <img src="{{ asset('images/interior1.jpg') }}" alt="Pink Cafe Interior">
            </div>
            <div class="gallery-card" onclick="openGalleryModal(this.querySelector('img').src)">
                <img src="{{ asset('images/interior2.jpg') }}" alt="Pink Cafe Ambiance">
            </div>
            <div class="gallery-card" onclick="openGalleryModal(this.querySelector('img').src)">
                <img src="{{ asset('images/interior3.jpg') }}" alt="Pink Cafe Space">
            </div>
        </div>
    </section>

    {{-- MODAL PENTRU IMAGINE MARE --}}
    <div id="galleryModal" class="gallery-modal" onclick="closeGalleryModal()">
        <span class="gallery-close">&times;</span>
        <img class="gallery-modal-content" id="fullImage">
    </div>

    {{-- SCRIPT MODAL GALERIE --}}
    <script>
        function openGalleryModal(src) {
            var modal = document.getElementById('galleryModal');
            var img = document.getElementById('fullImage');
            img.src = src;
            modal.classList.add('active');
        }
        function closeGalleryModal() {
            var modal = document.getElementById('galleryModal');
            modal.classList.remove('active');
        }
        // Previne închiderea când dai click pe imagine
        document.addEventListener('DOMContentLoaded', function() {
            var img = document.getElementById('fullImage');
            img.addEventListener('click', function(event) {
                event.stopPropagation();
            });
            // Închide și la click pe X
            document.querySelector('.gallery-close').addEventListener('click', function(event) {
                event.stopPropagation();
                closeGalleryModal();
            });
        });
    </script>
    {{-- DE CE PINK CAFÉ SECTION --}}
    <section class="why-us">
        <h2 class="section-title">De ce PINK CAFÉ?</h2>
        <div class="why-grid">

            <div class="why-card">
                <div class="why-icon" style="background: linear-gradient(135deg, #e91e8c, #f06292)">
                    <i class="fa-solid fa-mug-saucer" style="color: white;"></i>
                </div>
                <h3>Cafea de Calitate Superioară</h3>
                <p>Folosim doar boabe de cafea premium, prăjite proaspăt și preparate de barista profesioniști. Fiecare ceașcă este o experiență unică.</p>
            </div>

            <div class="why-card">
                <div class="why-icon" style="background: linear-gradient(135deg, #9c27b0, #e91e8c)">
                    <i class="fa-solid fa-star" style="color: white;"></i>
                </div>
                <h3>Deserturi Unice și Delicioase</h3>
                <p>Prăjituri artizanale, mochi japoneze și creații dulci exclusiviste preparate zilnic din ingrediente de calitate înaltă.</p>
            </div>

            <div class="why-card">
                <div class="why-icon" style="background: linear-gradient(135deg, #7b1fa2, #9c27b0)">
                    <i class="fa-solid fa-people-group" style="color: white;"></i>
                </div>
                <h3>Atmosferă Plăcută și Relaxantă</h3>
                <p>Design modern, spațiu confortabil și muzică ambientală creează locul perfect pentru întâlniri cu prietenii sau lucru în liniște.</p>
            </div>

        </div>
    </section>

@endsection