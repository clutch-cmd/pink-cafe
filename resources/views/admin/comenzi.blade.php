@extends('admin.layout')

@section('title', 'Comenzi')

@section('content')

<div class="admin-header">
    <h1>Comenzi</h1>
    <p>Gestionează toate comenzile</p>
</div>

<div class="admin-card">

    {{-- TABEL DESKTOP --}}
    <table class="admin-table desktop-only">
        <thead>
            <tr>
                <th>#</th>
                <th>Nume</th>
                <th>Telefon</th>
                <th>Adresă</th>
                <th>Total</th>
                <th>Status</th>
                <th>Data</th>
                <th>Acțiuni</th>
            </tr>
        </thead>
        <tbody>
            @forelse($comenzi as $comanda)
                <tr>
                    <td>{{ $comanda->id }}</td>
                    <td>{{ $comanda->nume }}</td>
                    <td>{{ $comanda->telefon }}</td>
                    <td>{{ $comanda->adresa }}</td>
                    <td>{{ $comanda->total }} lei</td>
                    <td>
                        <form method="POST" action="{{ route('admin.comenzi.status', $comanda->id) }}">
                            @csrf
                            <select name="status" onchange="this.form.submit()" class="status-select status-{{ $comanda->status }}">
                                <option value="noua" {{ $comanda->status == 'noua' ? 'selected' : '' }}>Nouă</option>
                                <option value="in_procesare" {{ $comanda->status == 'in_procesare' ? 'selected' : '' }}>În procesare</option>
                                <option value="livrata" {{ $comanda->status == 'livrata' ? 'selected' : '' }}>Livrată</option>
                                <option value="anulata" {{ $comanda->status == 'anulata' ? 'selected' : '' }}>Anulată</option>
                            </select>
                        </form>
                    </td>
                    <td>{{ $comanda->created_at ? $comanda->created_at->format('d.m.Y H:i') : 'N/A' }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.comenzi.sterge', $comanda->id) }}" onsubmit="return confirm('Ștergi comanda?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sterge">
                                <i class="fas fa-trash"></i> Șterge
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="text-center">Nu există comenzi</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- CARDURI MOBIL --}}
    <div class="mobile-only">
        @forelse($comenzi as $comanda)
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
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $comanda->adresa }}</span>
                    </div>
                    <div class="mobile-card-row">
                        <i class="fas fa-money-bill"></i>
                        <span><strong>{{ $comanda->total }} lei</strong></span>
                    </div>
                    @if($comanda->comentarii)
                        <div class="mobile-card-row">
                            <i class="fas fa-comment"></i>
                            <span>{{ $comanda->comentarii }}</span>
                        </div>
                    @endif
                    <div class="mobile-card-row">
                        <i class="fas fa-clock"></i>
                        <span>{{ $comanda->created_at ? $comanda->created_at->format('d.m.Y H:i') : 'N/A' }}</span>
                    </div>
                </div>

                <div class="mobile-card-footer">
                    <form method="POST" action="{{ route('admin.comenzi.status', $comanda->id) }}" style="flex:1">
                        @csrf
                        <select name="status" onchange="this.form.submit()" class="status-select-mobile">
                            <option value="noua" {{ $comanda->status == 'noua' ? 'selected' : '' }}>Nouă</option>
                            <option value="in_procesare" {{ $comanda->status == 'in_procesare' ? 'selected' : '' }}>În procesare</option>
                            <option value="livrata" {{ $comanda->status == 'livrata' ? 'selected' : '' }}>Livrată</option>
                            <option value="anulata" {{ $comanda->status == 'anulata' ? 'selected' : '' }}>Anulată</option>
                        </select>
                    </form>
                    <form method="POST" action="{{ route('admin.comenzi.sterge', $comanda->id) }}" onsubmit="return confirm('Ștergi comanda?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-sterge-mobile">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="mobile-empty">
                <i class="fas fa-inbox"></i>
                <p>Nu există comenzi</p>
            </div>
        @endforelse
    </div>

</div>

@endsection