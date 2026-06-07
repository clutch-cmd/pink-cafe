@extends('layouts.app')

@section('title', 'Meniu')

@section('styles')
    {{-- Păstrăm spargerea de cache pentru stilul de meniu --}}
    <link rel="stylesheet" href="{{ asset('css/meniu.css') }}?v={{ time() }}">
@endsection

@section('content')

<div class="meniu-page">

    <div class="meniu-header">
        <h1>Meniul Nostru</h1>
        <p>Descoperă gama noastră variată de băuturi și deserturi delicioase</p>
    </div>

    {{-- BAUTURI CALDE --}}
    <div class="meniu-section">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-mug-saucer"></i></span> Băuturi Calde
        </h2>
        <div class="meniu-grid">
            @foreach($bauturiCalde as $produs)
                <a href="{{ route('produs.show', $produs->id) }}" class="meniu-item">
                    <span class="meniu-item-name">{!! $produs->nume !!}</span>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- COCKTAILURI --}}
    <div class="meniu-section">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-glass-martini-alt"></i></span> Cocktailuri
        </h2>
        <div class="meniu-grid">
            @foreach($cocktailuri as $produs)
                <a href="{{ route('produs.show', $produs->id) }}" class="meniu-item">
                    <span class="meniu-item-name">{!! $produs->nume !!}</span>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- LEMONADES --}}
    <div class="meniu-section">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-droplet"></i></span> Fresh Lemonades
        </h2>
        <div class="meniu-grid">
            @foreach($lemonades as $produs)
                <a href="{{ route('produs.show', $produs->id) }}" class="meniu-item">
                    <span class="meniu-item-name">{!! $produs->nume !!}</span>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- DESERTURI --}}
    <div class="meniu-section">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-cake-candles"></i></span> Deserturi
        </h2>
        <div class="meniu-grid meniu-grid-2">
            @foreach($deserturi as $produs)
                <a href="{{ route('produs.show', $produs->id) }}" class="meniu-item meniu-item-desert">
                    <div class="meniu-item-desert-info">
                        <span class="meniu-item-name">{!! $produs->nume !!}</span>
                        @if($produs->alergeni)
                            <span class="meniu-item-alergeni">{{ $produs->alergeni }}</span>
                        @endif
                    </div>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- INGHETATA --}}
    <div class="meniu-section">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-ice-cream"></i></span> Înghețată
        </h2>
        <div class="meniu-grid">
            @foreach($inghetata as $produs)
                <a href="{{ route('produs.show', $produs->id) }}" class="meniu-item">
                    <span class="meniu-item-name">{!! $produs->nume !!}</span>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

</div>

@endsection