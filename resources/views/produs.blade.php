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
        <a class="meniu-item meniu-item-desert">
            <span class="meniu-item-desc">{{ $produs->descriere }}</span>
        </a>
        {{-- Prețul care se va schimba dinamic --}}
        <div style="display:flex; align-items:center; gap:16px; flex-wrap:wrap;">
            <div class="product-price-box" style="flex:1;">
                <span id="dinamic-price">{{ number_format($produs->pret, 0) }}</span> lei
            </div>
            @auth
                <form method="POST" action="{{ route('favorite.toggle', $produs->id) }}">
                    @csrf
                    <button type="submit" class="fav-prod-btn {{ Auth::user()->favorite->contains($produs->id) ? 'fav-active' : '' }}" style="
                        display:flex; align-items:center; gap:8px;
                        padding:10px 20px; border-radius:50px; border:2px solid #fbcfe8;
                        background: {{ Auth::user()->favorite->contains($produs->id) ? '#fdf2f8' : 'white' }};
                        color: {{ Auth::user()->favorite->contains($produs->id) ? '#db2777' : '#9ca3af' }};
                        cursor:pointer; font-size:0.9rem; font-weight:600;
                        font-family:inherit; transition:all 0.2s;
                    " onmouseover="this.style.borderColor='#db2777';this.style.color='#db2777';this.style.background='#fdf2f8'" onmouseout="this.style.borderColor='#fbcfe8';this.style.color='{{ Auth::user()->favorite->contains($produs->id) ? '#db2777' : '#9ca3af' }}';this.style.background='{{ Auth::user()->favorite->contains($produs->id) ? '#fdf2f8' : 'white' }}'">
                        <i class="fa-solid fa-heart"></i>
                        <span>{{ Auth::user()->favorite->contains($produs->id) ? 'În preferate' : 'Salvează' }}</span>
                    </button>
                </form>
            @endauth
        </div>

        {{-- MESAJ DE SUCCES LA SALVAREA REZERVĂRII --}}
        @if(session('succes'))
            <div style="background: rgba(74, 222, 128, 0.15); border: 1px solid #4ade80; color: #166534; padding: 12px 15px; border-radius: 12px; margin-bottom: 20px; text-align: center; font-weight: 600; font-size: 0.95rem;">
                <i class="fa-solid fa-circle-check" style="margin-right: 5px;"></i> {{ session('succes') }}
            </div>
        @endif

        {{-- PERSONALIZATOR PRODUS (băuturi) --}}
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

                {{-- Extra Toppings --}}
                <p style="font-size: 0.9rem; font-weight: 600; margin-bottom: 8px; margin-top: 15px;">Adaugă extra topping:</p>
                <div class="option-group">
                    <label class="option-label">
                        <span><input type="checkbox" id="topping_frisca" value="frisca" data-price="10" class="topping-cb"> Frișcă Premium</span>
                        <span class="option-price">+10 lei</span>
                    </label>
                    <label class="option-label">
                        <span><input type="checkbox" id="topping_sirop" value="sirop_vanilie" data-price="8" class="topping-cb"> Sirop Vanilie</span>
                        <span class="option-price">+8 lei</span>
                    </label>
                    <label class="option-label">
                        <span><input type="checkbox" id="topping_gheata" value="gheata" data-price="0" class="topping-cb"> Gheață Extra</span>
                        <span class="option-price">+0 lei</span>
                    </label>
                </div>
            </div>
        @endif

        {{-- Personalizator pentru Sandvișuri & Burgere --}}
        @if($produs->categorie == 'sandvisuri_burgere')
            <div class="customizer-section">
                <h3 class="section-subtitle"><i class="fa-solid fa-burger" style="color: #e91e8c;"></i> Personalizează Preparatul</h3>
                
                <p style="font-size: 0.9rem; font-weight: 600; margin-bottom: 8px;">Alege extra ingrediente:</p>
                <div class="option-group">
                    <label class="option-label">
                        <span><input type="checkbox" id="extra_bacon" value="bacon" data-price="15" class="extra-cb"> Extra Bacon</span>
                        <span class="option-price">+15 lei</span>
                    </label>
                    <label class="option-label">
                        <span><input type="checkbox" id="extra_cascaval" value="cascaval" data-price="10" class="extra-cb"> Extra Cașcaval</span>
                        <span class="option-price">+10 lei</span>
                    </label>
                    <label class="option-label">
                        <span><input type="checkbox" id="extra_ou" value="ou" data-price="8" class="extra-cb"> Ou Prăjit</span>
                        <span class="option-price">+8 lei</span>
                    </label>
                </div>

                <p style="font-size: 0.9rem; font-weight: 600; margin-bottom: 8px; margin-top: 15px;">Alege sosul preferat:</p>
                <div class="option-group">
                    <label class="option-label">
                        <span><input type="radio" name="sos_extra" value="ketchup" data-price="0" checked> Ketchup</span>
                        <span class="option-price">+0 lei</span>
                    </label>
                    <label class="option-label">
                        <span><input type="radio" name="sos_extra" value="maioneza" data-price="0"> Maioneză</span>
                        <span class="option-price">+0 lei</span>
                    </label>
                    <label class="option-label">
                        <span><input type="radio" name="sos_extra" value="bbq" data-price="5"> Sos BBQ</span>
                        <span class="option-price">+5 lei</span>
                    </label>
                    <label class="option-label">
                        <span><input type="radio" name="sos_extra" value="usturoi" data-price="3"> Sos de Usturoi</span>
                        <span class="option-price">+3 lei</span>
                    </label>
                </div>
            </div>
        @endif

        {{-- Alergeni --}}
        @if($produs->alergeni)
            <div class="alergeni-alert">
                <i class="fa-solid fa-triangle-exclamation" style="font-size: 1.1rem; margin-top: 2px;"></i>
                <div>
                    <strong>Informație Alergeni:</strong> {{ $produs->alergeni }}
                </div>
            </div>
        @endif
        
        {{-- BUTON ADAUGĂ ÎN COȘ --}}
        <button type="button" class="btn-action-order" onclick="addToCart()">
            <i class="fa-solid fa-cart-plus"></i> Adaugă în Coș
        </button>

    </div>
</div>
{{-- PRODUSE SIMILARE --}}
@if($produseSimilare->count() > 0)
<section class="similare-section">
    <h2 class="similare-title">Produse Similare</h2>

    @if($produseSimilare->count() > 2)
    <div class="similare-slider-container">
        <button class="similare-arrow-prev" onclick="moveSimilare(-1)">&#10094;</button>
        <div class="similare-slider-track" id="similareTrack">
            @foreach($produseSimilare as $similare)
            <a href="{{ route('produs.show', $similare->id) }}" class="similare-slide-item">
                <div class="similare-slide-img">
                    @if($similare->imagine && trim($similare->imagine) !== '')
                        <img src="{{ asset('images/' . $similare->imagine) }}" alt="{{ $similare->nume }}">
                    @else
                        <div class="similare-slide-fallback">
                            <i class="fa-solid fa-mug-saucer"></i>
                        </div>
                    @endif
                </div>
                <div class="similare-slide-badge">
                    <span class="similare-slide-name">{{ $similare->nume }}</span>
                    <span class="similare-slide-pret">{{ number_format($similare->pret, 0) }} lei</span>
                </div>
            </a>
            @endforeach
        </div>
        <button class="similare-arrow-next" onclick="moveSimilare(1)">&#10095;</button>
    </div>
    @else
    <div class="similare-grid">
        @foreach($produseSimilare as $similare)
        <a href="{{ route('produs.show', $similare->id) }}" class="similare-slide-item">
            <div class="similare-slide-img">
                @if($similare->imagine && trim($similare->imagine) !== '')
                    <img src="{{ asset('images/' . $similare->imagine) }}" alt="{{ $similare->nume }}">
                @else
                    <div class="similare-slide-fallback">
                        <i class="fa-solid fa-mug-saucer"></i>
                    </div>
                @endif
            </div>
            <div class="similare-slide-badge">
                <span class="similare-slide-name">{{ $similare->nume }}</span>
                <span class="similare-slide-pret">{{ number_format($similare->pret, 0) }} lei</span>
            </div>
        </a>
        @endforeach
    </div>
    @endif
</section>

<script>
let similareCurrent = 0;
function moveSimilare(dir) {
    const track = document.getElementById('similareTrack');
    if (!track) return;
    const items = track.querySelectorAll('.similare-slide-item');
    const total = items.length;
    similareCurrent = (similareCurrent + dir + total) % total;
    const itemWidth = items[0].offsetWidth + 20; // width + gap
    const offset = similareCurrent * itemWidth;
    track.scrollTo({ left: offset, behavior: 'smooth' });
}
</script>
@endif

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ro.js"></script>

<script>
    // --- ADAUGĂ ÎN COȘ FUNCȚIE ---
    function addToCart() {
        // Calculează prețul final cu opțiunile selectate
        let pretAdaugat = 0;
        const inputsLapte = document.querySelectorAll('input[name="optiune_lapte"]');
        const inputsToppings = document.querySelectorAll('.topping-cb');
        const inputsExtra = document.querySelectorAll('.extra-cb');
        const inputsSos = document.querySelectorAll('input[name="sos_extra"]');

        inputsLapte.forEach(radio => { if(radio.checked) pretAdaugat += parseFloat(radio.getAttribute('data-price')); });
        inputsToppings.forEach(cb => { if(cb.checked) pretAdaugat += parseFloat(cb.getAttribute('data-price')); });
        inputsExtra.forEach(cb => { if(cb.checked) pretAdaugat += parseFloat(cb.getAttribute('data-price')); });
        inputsSos.forEach(radio => { if(radio.checked) pretAdaugat += parseFloat(radio.getAttribute('data-price')); });

        const pretFinal = {{ $produs->pret }} + pretAdaugat;

        // Colectează opțiunile selectate
        const optiuni = [];
        document.querySelectorAll('input[type="radio"]:checked, .topping-cb:checked, .extra-cb:checked').forEach(input => {
            const label = input.closest('.option-label');
            if (label) {
                const text = label.querySelector('span')?.textContent.trim() || input.value;
                optiuni.push(text);
            }
        });

        // Adaugă în coș
        if (typeof addItemToCart === 'function') {
            const imageUrl = '{{ $produs->imagine ? '/images/' . $produs->imagine : '' }}';
            addItemToCart({{ $produs->id }}, '{{ addslashes($produs->nume) }}', pretFinal, imageUrl, { options: optiuni.join(', ') });
            toggleCartPanel();
        } else {
            alert('Produsul a fost adăugat în coș!');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // --- LOGICĂ FLATPICKR PENTRU CALENDAR ---
        flatpickr("#res_date", {
            locale: "ro",
            minDate: "today",
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "d F Y",
            disableMobile: "true"
        });

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
        const inputsExtra = document.querySelectorAll('.extra-cb');
        const inputsSos = document.querySelectorAll('input[name="sos_extra"]');

        function calculeazaPretFinal() {
            let pretAdaugat = 0;
            inputsLapte.forEach(radio => { if(radio.checked) pretAdaugat += parseFloat(radio.getAttribute('data-price')); });
            inputsToppings.forEach(cb => { if(cb.checked) pretAdaugat += parseFloat(cb.getAttribute('data-price')); });
            inputsExtra.forEach(cb => { if(cb.checked) pretAdaugat += parseFloat(cb.getAttribute('data-price')); });
            inputsSos.forEach(radio => { if(radio.checked) pretAdaugat += parseFloat(radio.getAttribute('data-price')); });
            const pretFinal = pretBaza + pretAdaugat;
            elementPret.textContent = pretFinal.toLocaleString('ro-RO', { minimumFractionDigits: 0 });
        }

        inputsLapte.forEach(radio => radio.addEventListener('change', calculeazaPretFinal));
        inputsToppings.forEach(cb => cb.addEventListener('change', calculeazaPretFinal));
        inputsExtra.forEach(cb => cb.addEventListener('change', calculeazaPretFinal));
        inputsSos.forEach(radio => radio.addEventListener('change', calculeazaPretFinal));
    });
</script>
@endsection