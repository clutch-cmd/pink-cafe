@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

<div class="admin-header">
    <h1><i class="fa-solid fa-chart-line"></i> Dashboard</h1>
    <p>Bun venit în panelul de administrare Pink Cafe!</p>
</div>

<div class="admin-stats">
    <div class="stat-card">
        <div class="stat-icon"><i class="fa-solid fa-clipboard-list"></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ $totalComenzi }}</span>
            <span class="stat-label">Total Comenzi</span>
        </div>
    </div>
    <div class="stat-card stat-pink">
        <div class="stat-icon"><i class="fa-solid fa-bell "></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ $comenziNoi }}</span>
            <span class="stat-label">Comenzi Noi</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ number_format($totalVanzari, 0) }} lei</span>
            <span class="stat-label">Total Vânzări</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fa-solid fa-utensils"></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ $totalProduse }}</span>
            <span class="stat-label">Produse</span>
        </div>
    </div>
</div>

<div class="admin-card">
    <h2><i class="fa-solid fa-clock-rotate-left"></i> Ultimele Comenzi</h2>
    <table class="admin-table">
        <thead>
            <tr>
                <th><i class="fa-solid fa-hashtag"></i></th>
                <th>Nume</th>
                <th>Telefon</th>
                <th>Total</th>
                <th>Status</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ultimeleComenzi as $comanda)
                <tr>
                    <td>{{ $comanda->id }}</td>
                    <td>{{ $comanda->nume }}</td>
                    <td><i style="font-size: 0.8em"></i> {{ $comanda->telefon }}</td>
                    <td><strong>{{ $comanda->total }} lei</strong></td>
                    <td><span class="status-badge status-{{ $comanda->status }}">{{ $comanda->status }}</span></td>
                    <td>{{ $comanda->created_at ? $comanda->created_at->format('d.m.Y H:i') : 'N/A' }}</td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Nu există comenzi</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection