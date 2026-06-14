@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

<div class="admin-header">
    <h1>Dashboard</h1>
    <p>Bun venit în panelul de administrare PINK CAFÉ!</p>
</div>

<div class="admin-stats">
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-list"></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ $totalComenzi }}</span>
            <span class="stat-label">Total Comenzi</span>
        </div>
    </div>
    <div class="stat-card stat-pink">
        <div class="stat-icon"><i class="fas fa-bell"></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ $comenziNoi }}</span>
            <span class="stat-label">Comenzi Noi</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-money-bill"></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ number_format($totalVanzari, 0) }} lei</span>
            <span class="stat-label">Total Vânzări</span>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-utensils"></i></div>
        <div class="stat-info">
            <span class="stat-number">{{ $totalProduse }}</span>
            <span class="stat-label">Produse</span>
        </div>
    </div>
</div>

{{-- TABEL DESKTOP --}}
<div class="admin-card">
    <h2>Ultimele Comenzi</h2>

    <table class="admin-table desktop-only">
        <thead>
    <tr>
        <th>#</th>
        <th>Nume</th>
        <th>Telefon</th>
        <th>Total</th>
        <th>Data Rezervare</th>
        <th>Ora</th>
        <th>Mențiuni</th>
        <th>Status</th>
        <th>Data</th>
    </tr>
</thead>
        <tbody>
            @forelse($ultimeleComenzi as $comanda)
                <tr>
                    <td>{{ $comanda->id }}</td>
                    <td>{{ $comanda->nume }}</td>
                    <td>{{ $comanda->telefon }}</td>
                    <td>{{ $comanda->total }} lei</td>
                    <td>{{ $comanda->data_rezervare ?? '—' }}</td>
                    <td>{{ $comanda->ora_rezervare ?? '—' }}</td>
                    <td>{{ $comanda->mentiuni ?? '—' }}</td>
                    <td>
                        <span class="status-badge status-{{ $comanda->status }}">
                            {{ $comanda->status == 'noua' ? 'Nouă' :
                               ($comanda->status == 'in_procesare' ? 'În procesare' :
                               ($comanda->status == 'livrata' ? 'Livrată' : 'Anulată')) }}
                        </span>
                    </td>
                    <td>{{ $comanda->created_at ? $comanda->created_at->format('d.m.Y H:i') : 'N/A' }}</td>
                </tr>
            @empty
                <tr><td colspan="9" class="text-center">Nu există comenzi</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- CARDURI MOBIL --}}
    <div class="mobile-only">
        @forelse($ultimeleComenzi as $comanda)
            <div class="mobile-card">
                <div class="mobile-card-header">
                    <span class="mobile-card-id">#{{ $comanda->id }}</span>
                    <span class="status-badge status-{{ $comanda->status }}">
                        {{ $comanda->status == 'noua' ? 'Nouă' :
                           ($comanda->status == 'in_procesare' ? 'În procesare' :
                           ($comanda->status == 'livrata' ? 'Livrată' : 'Anulată')) }}
                    </span>
                </div>
               
                <div class="mobile-card-body">
                    <div class="mobile-card-row">
                        <i class="fas fa-user"></i>
                        <span>{{ $comanda->nume }}</span>
                    </div>
                    <div class="mobile-card-row">
                        <i class="fas fa-phone"></i>
                        <span>{{ $comanda->telefon }}</span>
                    </div>
                    <div class="mobile-card-row">
                        <i class="fas fa-money-bill"></i>
                        <span><strong>{{ $comanda->total }} lei</strong></span>
                    </div>
                     @if($comanda->data_rezervare)
                    <div class="mobile-card-row">
                        <i class="fas fa-calendar-day"></i>
                        <span>Rezervare: <strong>{{ $comanda->data_rezervare }}</strong></span>
                    </div>
                @endif

                @if($comanda->ora_rezervare)
                    <div class="mobile-card-row">
                        <i class="fas fa-clock"></i>
                        <span>Ora: <strong>{{ $comanda->ora_rezervare }}</strong></span>
                    </div>
                @endif

                @if($comanda->mentiuni)
                    <div class="mobile-card-row">
                        <i class="fas fa-comment-dots"></i>
                        <span>{{ $comanda->mentiuni }}</span>
                    </div>
                @endif
                    <div class="mobile-card-row">
                        <i class="fas fa-clock"></i>
                        <span>{{ $comanda->created_at ? $comanda->created_at->format('d.m.Y H:i') : 'N/A' }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="mobile-empty">
                <i class="fas fa-inbox"></i>
                <p>Nu există comenzi</p>
            </div>
        @endforelse
    </div>

    <a href="{{ route('admin.comenzi') }}" class="btn-vezi-toate">
        <i class="fas fa-arrow-right"></i> Vezi toate comenzile
    </a>
</div>

@endsection