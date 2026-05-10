@extends('layouts.app')

@section('title', 'Comandă Plasată')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/comanda.css') }}">
@endsection

@section('content')

<div class="succes-page">
    <div class="succes-card">

        <div class="succes-icon">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        
        <h1>Comanda a fost plasată!</h1>
        <p>Îți mulțumim, <strong>{{ $comanda->nume }}</strong>! Te vom contacta în scurt timp la <i class="fa-solid fa-phone-flip" style="font-size: 0.9em; margin-left: 5px;"></i> <strong>{{ $comanda->telefon }}</strong>.</p>

        <div class="succes-detalii">
            <h3><i class="fa-solid fa-receipt"></i> Detalii comandă #{{ $comanda->id }}</h3>
            
            @foreach($comanda->produse as $produs)
                <div class="succes-produs">
                    <span><i class="fa-solid fa-mug-hot" style="color: #e91e63; margin-right: 8px;"></i> {{ $produs->nume }} × {{ $produs->pivot->cantitate }}</span>
                    <span>{{ $produs->pivot->pret * $produs->pivot->cantitate }} lei</span>
                </div>
            @endforeach

            <div class="succes-total">
                <strong>Total: {{ $comanda->total }} lei</strong>
            </div>
        </div>

        <div class="succes-footer-msg">
            <p><i class="fa-solid fa-truck-ramp-box"></i> Comanda ta este în curs de preparare!</p>
        </div>

        <a href="{{ route('home') }}" class="btn-acasa">
            <i class="fa-solid fa-house"></i> Înapoi la Home
        </a>
    </div>
</div>

@endsection