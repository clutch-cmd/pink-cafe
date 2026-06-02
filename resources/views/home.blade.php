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

{{-- GALERIE SLIDER PREMIUM SECTION --}}
    <section class="gallery">
        <h2 class="section-title">Produsele Noastre</h2>
        
        <div class="slider-container">
            <!-- Săgeată Stânga -->
            <button class="slider-arrow prev-btn" onclick="moveSlide(-1)">&#10094;</button>
            
            <div class="slider-track" id="sliderTrack">
                <div class="slide-item active">
                    <img src="{{ asset('images/aperol_spritz.jpg') }}" alt="Aperol Spritz" onclick="openGalleryModal(this.src)">
                    <div class="slide-badge">Aperol Spritz</div>
                </div>

                <div class="slide-item">
                    <img src="{{ asset('images/malibu.jpg') }}" alt="Malibu" onclick="openGalleryModal(this.src)">
                    <div class="slide-badge">Malibu</div>
                </div>

                <div class="slide-item">
                    <img src="{{ asset('images/bounty_coffee.jpg') }}" alt="Bounty Coffee" onclick="openGalleryModal(this.src)">
                    <div class="slide-badge">Bounty Coffee</div>
                </div>

                <div class="slide-item">
                    <img src="{{ asset('images/tea_fruit.jpg') }}" alt="Tea Fruit Symphony" onclick="openGalleryModal(this.src)">
                    <div class="slide-badge">Tea Fruit Symphony</div>
                </div>

                <div class="slide-item">
                    <img src="{{ asset('images/bubble_gum.jpg') }}" alt="Buble Gum" onclick="openGalleryModal(this.src)">
                    <div class="slide-badge">Buble Gum</div>
                </div>

                <div class="slide-item">
                    <img src="{{ asset('images/fresh_grapefruit.jpg') }}" alt="Fresh Grapefruit" onclick="openGalleryModal(this.src)">
                    <div class="slide-badge">Fresh Grapefruit</div>
                </div>
            </div>

            <!-- Săgeată Dreapta -->
            <button class="slider-arrow next-btn" onclick="moveSlide(1)">&#10095;</button>
        </div>
    </section>

    {{-- MODAL PENTRU IMAGINE MARE --}}
    <div id="galleryModal" class="gallery-modal" onclick="closeGalleryModal()">
        <span class="gallery-close">&times;</span>
        <img class="gallery-modal-content" id="fullImage">
    </div>

    {{-- SCRIPT PENTRU CONTROL SLIDER & MODAL --}}
    <script>
        let currentIndex = 0;
        let autoSlideInterval;
        let slides = [];
        let totalSlides = 0;

        function updateCarousel() {
            slides.forEach((slide, index) => {
                slide.classList.remove('active', 'prev', 'next');
                
                if (index === currentIndex) {
                    slide.classList.add('active');
                } else if (index === (currentIndex - 1 + totalSlides) % totalSlides) {
                    slide.classList.add('prev');
                } else if (index === (currentIndex + 1) % totalSlides) {
                    slide.classList.add('next');
                }
            });
        }

        function moveSlide(direction) {
            currentIndex = (currentIndex + direction + totalSlides) % totalSlides;
            updateCarousel();
            resetAutoSlide();
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(() => {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateCarousel();
            }, 5000);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        // Modal Functions
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

        document.addEventListener('DOMContentLoaded', function() {
            slides = document.querySelectorAll('.slide-item');
            totalSlides = slides.length;
            
            updateCarousel();
            startAutoSlide();

            var img = document.getElementById('fullImage');
            img.addEventListener('click', function(event) {
                event.stopPropagation();
            });
            
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