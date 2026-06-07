@extends('layouts.app')

@section('title', $produs->nume)

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="{{ asset('css/product-custom.css') }}">
@endsection

@section('content')
<div class="product-page">

    {{-- BUTONUL DE ÎNAPOI LA MENIU --}}
    <div class="back-to-menu-wrapper">
        <a href="{{ url('/meniu') }}" class="btn-back-menu">
            <i class="fa-solid fa-arrow-left-long"></i> Înapoi la Meniu
        </a>
    </div>

    {{-- COLOANA STÂNGA: IMAGINE --}}
    <div class="product-image-container">
        @if($produs->imagine && trim($produs->imagine) !== '')
            <img src="{{ asset('images/' . $produs->imagine) }}" alt="{{ $produs->nume }}" class="product-main-img">
        @else
            {{-- Pictogramă fallback dacă produsul nu are poză încărcată --}}
            <div class="product-fallback-icon">
                @if($produs->categorie == 'bauturi_calde') <i class="fa-solid fa-mug-saucer"></i>
                @elseif($produs->categorie == 'cocktailuri') <i class="fa-solid fa-glass-martini-alt"></i>
                @elseif($produs->categorie == 'lemonades') <i class="fa-solid fa-droplet"></i>
                @elseif($produs->categorie == 'deserturi') <i class="fa-solid fa-cake-candles"></i>
                @else <i class="fa-solid fa-ice-cream"></i>
                @endif
            </div>
        @endif
    </div>

    {{-- COLOANA DREAPTĂ: DETALII ȘI FORMULARE --}}
    <div class="product-details-container">
        <span class="product-category">
            @if($produs->categorie == 'bauturi_calde') Băuturi Calde
            @elseif($produs->categorie == 'cocktailuri') Cocktailuri
            @elseif($produs->categorie == 'lemonades') Fresh Lemonades
            @elseif($produs->categorie == 'deserturi') Deserturi
            @else Înghețată
            @endif
        </span>
        
        <h1 class="product-title">{!! $produs->nume !!}</h1>
        
        {{-- Prețul care se va schimba dinamic --}}
        <div class="product-price-box">
            <span id="dinamic-price">{{ number_format($produs->pret, 0) }}</span> lei
        </div>

        {{-- MESAJ DE SUCCES LA SALVAREA REZERVĂRII --}}
        @if(session('succes'))
            <div style="background: rgba(74, 222, 128, 0.15); border: 1px solid #4ade80; color: #166534; padding: 12px 15px; border-radius: 12px; margin-bottom: 20px; text-align: center; font-weight: 600; font-size: 0.95rem;">
                <i class="fa-solid fa-circle-check" style="margin-right: 5px;"></i> {{ session('succes') }}
            </div>
        @endif

        {{-- FORMULARUL GLOBAL (Trimite personalizarea și rezervarea împreună) --}}
        <form action="{{ route('comanda.trimite') }}" method="POST">
        @csrf
            <input type="hidden" name="produs_id" value="{{ $produs->id }}">

            {{-- 1. PERSONALIZATOR PRODUS --}}
            @if(in_array($produs->categorie, ['bauturi_calde', 'cocktailuri', 'lemonades']))
                <div class="customizer-section">
                    <h3 class="section-subtitle"><i class="fa-solid fa-sliders" style="color: #e91e8c;"></i> Personalizează băutura</h3>
                    
                    {{-- Opțiune tip lapte (Doar pentru băuturile calde) --}}
                    @if($produs->categorie == 'bauturi_calde')
                        <p style="font-size: 0.9rem; font-weight: 600; margin-bottom: 8px;">Alege laptele:</p>
                        <div class="option-group">
                            <label class="option-label">
                                <span><input type="radio" name="optiune_lapte" value="normal" data-price="0" checked> Lapte Normal</span>
                                <span class="option-price">+0 lei</span>
                            </label>
                            <label class="option-label">
                                <span><input type="radio" name="optiune_lapte" value="migdale" data-price="15"> Lapte de Migdale</span>
                                <span class="option-price">+15 lei</span>
                            </label>
                            <label class="option-label">
                                <span><input type="radio" name="optiune_lapte" value="ovaz" data-price="15"> Lapte de Ovăz</span>
                                <span class="option-price">+15 lei</span>
                            </label>
                        </div>
                    @endif

                    {{-- Extra Toppings (Schimbat din topping[] în toppings[] pentru a corespunde controllerului) --}}
                    <p style="font-size: 0.9rem; font-weight: 600; margin-bottom: 8px; margin-top: 15px;">Adaugă extra topping:</p>
                    <div class="option-group">
                        <label class="option-label">
                            <span><input type="checkbox" name="toppings[]" value="frisca" data-price="10" class="topping-cb"> Frișcă Premium</span>
                            <span class="option-price">+10 lei</span>
                        </label>
                        <label class="option-label">
                            <span><input type="checkbox" name="toppings[]" value="sirop_vanilie" data-price="8" class="topping-cb"> Sirop Vanilie</span>
                            <span class="option-price">+8 lei</span>
                        </label>
                        <label class="option-label">
                            <span><input type="checkbox" name="toppings[]" value="gheata" data-price="0" class="topping-cb"> Gheață Extra</span>
                            <span class="option-price">+0 lei</span>
                        </label>
                    </div>
                </div>
            @endif

            {{-- 2. SISTEMUL DE REZERVARE MĂSĂ / RIDICARE PROGRAMATĂ --}}
            <div class="reservation-section">
                <h3 class="section-subtitle"><i class="fa-solid fa-calendar-days" style="color: #9c27b0;"></i> Programează sau Rezervă masă</h3>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="res_date">Alege Data</label>
                        <input type="date" id="res_date" name="data_rezervare" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="res_time">Alege Ora</label>
                        <input type="time" id="res_time" name="ora_rezervare" class="form-control" required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="res_pers">Nr. Persoane (opțional)</label>
                        <select id="res_pers" name="numar_persoane" class="form-control">
                            <option value="">Doar ridicare (fără masă)</option>
                            <option value="1">1 Persoană (Masă)</option>
                            <option value="2">2 Persoane (Masă)</option>
                            <option value="4">4 Persoane (Masă)</option>
                            <option value="6">6+ Persoane (Masă)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="res_obs">Mențiuni speciale</label>
                        <input type="text" id="res_obs" name="mentiuni_speciale" class="form-control" placeholder="Ex: La geam, etc.">
                    </div>
                </div>
            </div>

            {{-- Alergeni --}}
            @if($produs->alergeni)
                <div class="alergeni-alert">
                    <i class="fa-solid fa-triangle-exclamation" style="font-size: 1.1rem; margin-top: 2px;"></i>
                    <div>
                        <strong>Informație Alergeni:</strong> {{ $produs->alergeni }}
                    </div>
                </div>
            @endif

            {{-- BUTONUL DE TRIMITERE ACTIONAL --}}
            <button type="submit" class="btn-action-order">
                <i class="fa-solid fa-basket-shopping"></i> Continuă spre Comandă
            </button>
        </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ro.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- LOGICĂ FLATPICKR PENTRU CALENDAR ---
        flatpickr("#res_date", {
            locale: "ro",                  // Setează calendarul în română
            minDate: "today",              // Blochează complet zilele din trecut
            dateFormat: "Y-m-d",           // Formatul trimis către baza de date
            altInput: true,                // Creează un input frumos mascat
            altFormat: "d F Y",            // Cum vede clientul data (ex: 05 Iunie 2026)
            disableMobile: "true"          // Forțează designul unitar și pe telefoane
        });

        // --- LOGICĂ FLATPICKR PENTRU CEAS ---
        flatpickr("#res_time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            disableMobile: "true"
        });

        // --- CALCULATOR DINAMIC DE PREȚ ---
        const pretBaza = {{ $produs->pret }};
        const elementPret = document.getElementById('dinamic-price');
        const inputsLapte = document.querySelectorAll('input[name="optiune_lapte"]');
        const inputsToppings = document.querySelectorAll('.topping-cb');

        function calculeazaPretFinal() {
            let pretAdaugat = 0;
            inputsLapte.forEach(radio => { if(radio.checked) pretAdaugat += parseFloat(radio.getAttribute('data-price')); });
            inputsToppings.forEach(cb => { if(cb.checked) pretAdaugat += parseFloat(cb.getAttribute('data-price')); });
            const pretFinal = pretBaza + pretAdaugat;
            elementPret.textContent = pretFinal.toLocaleString('ro-RO', { minimumFractionDigits: 0 });
        }

        inputsLapte.forEach(radio => radio.addEventListener('change', calculeazaPretFinal));
        inputsToppings.forEach(cb => cb.addEventListener('change', calculeazaPretFinal));
    });
</script>
@endsection