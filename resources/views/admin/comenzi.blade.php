@extends('admin.layout')

@section('title', 'Comenzi')

@section('content')

<div class="admin-header">
    <h1>Comenzi</h1>
    <p>Gestionează toate comenzile</p>
</div>

<div class="admin-card">
    <table class="admin-table">
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
                                    <i class="fa-solid fa-trash-can"></i> Șterge
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="text-center">Nu există comenzi</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection