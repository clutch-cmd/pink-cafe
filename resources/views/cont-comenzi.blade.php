@extends('layouts.app')

@section('title', 'Contul meu')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/cont-comezi.css') }}">
@endsection

@section('content')
<div class="cont-wrapper">

    <div class="cont-layout">

        {{-- SIDEBAR --}}
        <aside class="cont-sidebar">
            <div class="cont-sidebar-title">Contul Meu</div>

            <a href="#panou" class="cont-nav-link">
                <i class="fa-solid fa-gauge"></i> Panou control
            </a>
            <a href="#comenzi" class="cont-nav-link">
                <i class="fa-solid fa-bag-shopping"></i> Comenzi
            </a>
            <a href="#favorite" class="cont-nav-link">
                <i class="fa-solid fa-heart"></i> Favorite
            </a>
            <a href="#detalii-cont" class="cont-nav-link">
                <i class="fa-solid fa-user-pen"></i> Detalii cont
            </a>

            <div class="cont-nav-divider"></div>

            <form method="POST" action="{{ route('logout') }}" class="cont-nav-form">
                @csrf
                <button type="submit" class="cont-nav-link logout">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Deconectare
                </button>
            </form>
        </aside>

        {{-- CONTINUT --}}
        <div class="cont-content">

    {{-- Mesaje --}}
    @if(session('success'))
        <div class="cont-msg cont-msg-success"><i class="fa-solid fa-check-circle"></i> {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="cont-msg cont-msg-error"><i class="fa-solid fa-exclamation-circle"></i> {{ session('error') }}</div>
    @endif
    @if(session('success_fav'))
        <div class="cont-msg cont-msg-success"><i class="fa-solid fa-heart"></i> {{ session('success_fav') }}</div>
    @endif

    {{-- HERO / PANOU CONTROL --}}
    @php
        $totalComenzi = $comenzi->count();
        $comenziActive = $comenzi->whereIn('status', ['noua', 'in_procesare'])->count();
        $comenziLivrate = $comenzi->where('status', 'livrata')->count();
        $totalFavorite = Auth::user()->favorite()->count();
    @endphp

    <div class="cont-hero" id="panou">
        <div class="cont-hero-content">
            <div class="cont-greeting-row">
                <div class="cont-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <h1 class="cont-greeting">
                    <span class="cont-greeting-emoji"><i class="fa-solid fa-mug-saucer"></i></span>
                    Salut, {{ Auth::user()->name }}
                </h1>
            </div>
            <p class="cont-sub">Bine ai revenit la PINK CAFÉ — iată un sumar al activității tale.</p>
            <div class="cont-stats">
                <div class="cont-stat">
                    <span class="cont-stat-nr">{{ $totalComenzi }}</span>
                    <span class="cont-stat-label">Comenzi</span>
                </div>
                <div class="cont-stat">
                    <span class="cont-stat-nr">{{ $comenziActive }}</span>
                    <span class="cont-stat-label">Active</span>
                </div>
                <div class="cont-stat">
                    <span class="cont-stat-nr">{{ $comenziLivrate }}</span>
                    <span class="cont-stat-label">Livrate</span>
                </div>
                <div class="cont-stat">
                    <span class="cont-stat-nr">{{ $totalFavorite }}</span>
                    <span class="cont-stat-label">Favorite</span>
                </div>
            </div>
        </div>
    </div>

    {{-- FAVORITE --}}
    @php $favorite = Auth::user()->favorite; @endphp
    <div class="cont-section" id="favorite">
        <div class="cont-section-header">
            <h2 class="cont-section-title">
                <span class="icon icon-pink"><i class="fa-solid fa-heart"></i></span>
                Preferatele tale
            </h2>
        </div>

        @if($favorite->isNotEmpty())
        <div class="fav-scroll">
            @foreach($favorite as $produs)
            <div class="fav-card">
                <a href="{{ route('produs.show', $produs->id) }}">
                    @if($produs->imagine)
                        <img src="{{ asset('images/' . $produs->imagine) }}" alt="{{ $produs->nume }}" class="fav-img">
                    @else
                        <div class="fav-fallback">
                            @if($produs->categorie == 'bauturi_calde') <i class="fa-solid fa-mug-saucer"></i>
                            @elseif($produs->categorie == 'cocktailuri') <i class="fa-solid fa-glass-martini-alt"></i>
                            @elseif($produs->categorie == 'lemonades') <i class="fa-solid fa-droplet"></i>
                            @elseif($produs->categorie == 'deserturi') <i class="fa-solid fa-cake-candles"></i>
                            @else <i class="fa-solid fa-ice-cream"></i>
                            @endif
                        </div>
                    @endif
                </a>
                <form method="POST" action="{{ route('favorite.sterge', $produs->id) }}">
                    @csrf @method('DELETE')
                    <button type="submit" class="fav-del" title="Elimină"><i class="fa-solid fa-xmark"></i></button>
                </form>
                <div class="fav-body">
                    <a href="{{ route('produs.show', $produs->id) }}" class="fav-name">{{ $produs->nume }}</a>
                    <div class="fav-price">{{ number_format($produs->pret, 0) }} lei</div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="cont-empty">
            <div class="cont-empty-icon"><i class="fa-solid fa-heart"></i></div>
            <h3>Nicio preferință încă</h3>
            <p>Adaugă produse la favorite pentru a le găsi rapid aici.</p>
            <a href="{{ route('meniu') }}" class="cont-empty-btn">
                <i class="fa-solid fa-arrow-right"></i> Vezi meniul
            </a>
        </div>
        @endif
    </div>

    {{-- COMENZI TIMELINE --}}
    <div class="cont-section" id="comenzi">
        <div class="cont-section-header">
            <h2 class="cont-section-title">
                <span class="icon icon-coral"><i class="fa-solid fa-timeline"></i></span>
                Istoric comenzi
            </h2>
        </div>

        @if($comenzi->isEmpty())
            <div class="cont-empty">
                <div class="cont-empty-icon"><i class="fa-solid fa-mug-saucer"></i></div>
                <h3>Încă nici o comandă</h3>
                <p>Pare că nu ai comandat încă. Hai să începem cu ceva delicios!</p>
                <a href="{{ route('comanda') }}" class="cont-empty-btn">
                    <i class="fa-solid fa-arrow-right"></i> Comandă acum
                </a>
            </div>
        @else
            <div class="timeline">
                @foreach($comenzi as $comanda)
                <div class="tl-item">
                    <div class="tl-dot tl-dot-{{ $comanda->status }}"></div>
                    <div class="tl-card">
                        <div class="tl-head">
                            <div>
                                <span class="tl-id">Comanda #{{ $comanda->id }}</span>
                                <span class="tl-date">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $comanda->created_at->format('d M Y, H:i') }}
                                </span>
                            </div>
                            <span class="tl-badge tl-badge-{{ $comanda->status }}">
                                @switch($comanda->status)
                                    @case('noua') <i class="fas fa-clock"></i> Nouă @break
                                    @case('in_procesare') <i class="fas fa-cogs"></i> În procesare @break
                                    @case('livrata') <i class="fas fa-check-circle"></i> Livrată @break
                                    @case('anulata') <i class="fas fa-times-circle"></i> Anulată @break
                                    @default {{ $comanda->status }}
                                @endswitch
                            </span>
                        </div>

                        <div class="tl-details">
                            @if($comanda->data_rezervare)
                            <span class="tl-detail">
                                <i class="fas fa-calendar-day"></i>
                                {{ $comanda->data_rezervare instanceof \Carbon\Carbon ? $comanda->data_rezervare->format('d.m.Y') : $comanda->data_rezervare }}
                            </span>
                            @endif
                            @if($comanda->ora_rezervare)
                            <span class="tl-detail">
                                <i class="fas fa-clock"></i> {{ $comanda->ora_rezervare }}
                            </span>
                            @endif
                            @if($comanda->numar_persoane)
                            <span class="tl-detail">
                                <i class="fas fa-users"></i> {{ $comanda->numar_persoane }} pers.
                            </span>
                            @endif
                            @if($comanda->mentiuni)
                            <span class="tl-detail">
                                <i class="fas fa-comment"></i> {{ $comanda->mentiuni }}
                            </span>
                            @endif
                        </div>

                        <div class="tl-products">
                            @foreach($comanda->produse as $produs)
                            <div class="tl-prod">
                                <span class="tl-prod-name">
                                    {{ $produs->nume }}
                                    <span style="color:#999;">×{{ $produs->pivot->cantitate }}</span>
                                </span>
                                <span class="tl-prod-price">{{ number_format($produs->pivot->pret * $produs->pivot->cantitate, 2) }} lei</span>
                            </div>
                            @endforeach
                        </div>

                        <div class="tl-total">Total: {{ number_format($comanda->total, 2) }} lei</div>

                        @if($comanda->status !== 'livrata' && $comanda->status !== 'anulata' && $comanda->status !== 'finalizata')
                        <div class="tl-action">
                            <form method="POST" action="{{ route('cont.anuleaza', $comanda->id) }}" onsubmit="return confirm('Ești sigur că vrei să anulezi această comandă?')">
                                @csrf
                                <button type="submit" class="btn-cancel"><i class="fa-solid fa-ban"></i> Anulează comanda</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- DETALII CONT --}}
    <div class="cont-section" id="detalii-cont">
        <div class="cont-section-header">
            <h2 class="cont-section-title">
                <span class="icon icon-purple"><i class="fa-solid fa-user-pen"></i></span>
                Detalii cont
            </h2>
        </div>

        <div class="cont-form-card">
            <form method="POST" action="{{ route('cont.actualizeaza') }}">
                @csrf
                @method('PUT')

                <div class="cont-form-grid">
                    <div class="cont-form-group">
                        <label for="name">Nume afișat</label>
                        <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                        @error('name')
                            <span class="cont-form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="cont-form-group">
                        <label for="email">Adresă email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                        @error('email')
                            <span class="cont-form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="cont-form-divider">Schimbare parolă</div>

                <div class="cont-form-grid">
                    <div class="cont-form-group full">
                        <label for="current_password">Parola actuală</label>
                        <input type="password" id="current_password" name="current_password" autocomplete="current-password">
                        <span class="cont-form-hint">Lasă gol dacă nu vrei să schimbi parola</span>
                        @error('current_password')
                            <span class="cont-form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="cont-form-group">
                        <label for="password">Parolă nouă</label>
                        <input type="password" id="password" name="password" autocomplete="new-password">
                        @error('password')
                            <span class="cont-form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="cont-form-group">
                        <label for="password_confirmation">Confirmă parola nouă</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                    </div>
                </div>

                <button type="submit" class="btn-save-cont">
                    <i class="fa-solid fa-floppy-disk"></i> Salvează modificările
                </button>
            </form>
        </div>
    </div>

        </div>
        {{-- /cont-content --}}

    </div>
    {{-- /cont-layout --}}

</div>
@endsection