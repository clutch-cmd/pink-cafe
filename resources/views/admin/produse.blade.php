@extends('admin.layout')

@section('title', 'Produse')

@section('content')

<div class="admin-header">
    <h1>Produse</h1>
    <p>Gestionează meniul cafenelei</p>
</div>

{{-- Adaugă produs --}}
<div class="admin-card">
    <h2>Adaugă Produs Nou</h2>
    <form method="POST" action="{{ route('admin.produse.adauga') }}" class="admin-form">
        @csrf
        <div class="admin-form-grid">
            <div class="admin-field">
                <label>Nume</label>
                <input type="text" name="nume" placeholder="Numele produsului" required>
            </div>
            <div class="admin-field">
                <label>Preț (lei)</label>
                <input type="number" name="pret" placeholder="0" step="0.01" required>
            </div>
            <div class="admin-field">
                <label>Categorie</label>
                <select name="categorie" required>
                    <option value="bauturi_calde">Băuturi Calde</option>
                    <option value="cocktailuri">Cocktailuri</option>
                    <option value="lemonades">Lemonades</option>
                    <option value="deserturi">Deserturi</option>
                    <option value="inghetata">Înghețată</option>
                </select>
            </div>
            <div class="admin-field">
                <label>Alergeni</label>
                <input type="text" name="alergeni" placeholder="ex: gluten, lapte">
            </div>
            <div class="admin-field admin-field-full">
                <label>Descriere</label>
                <input type="text" name="descriere" placeholder="Descriere scurtă">
            </div>
            <div class="admin-field admin-field-full">
                <label>Ingrediente</label>
                <input type="text" name="ingrediente" placeholder="Ingrediente principale">
            </div>
        </div>
        <button type="submit" class="btn-adauga">+ Adaugă Produs</button>
    </form>
</div>

{{-- Lista produse --}}
<div class="admin-card">
    <h2>Produse Existente ({{ $produse->count() }})</h2>
    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nume</th>
                <th>Preț</th>
                <th>Categorie</th>
                <th>Acțiuni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produse as $produs)
                <tr>
                    <td>{{ $produs->id }}</td>
                    <td>{{ $produs->nume }}</td>
                    <td>{{ $produs->pret }} lei</td>
                    <td><span class="cat-badge">{{ $produs->categorie }}</span></td>
                    <td>
                        <form method="POST" action="{{ route('admin.produse.sterge', $produs->id) }}" onsubmit="return confirm('Ștergi produsul?')" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sterge">
                                    <i class="fa-solid fa-trash-can"></i> Șterge
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection