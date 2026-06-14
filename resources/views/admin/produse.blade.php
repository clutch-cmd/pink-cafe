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
    <form method="POST" action="{{ route('admin.produse.adauga') }}" class="admin-form" enctype="multipart/form-data">
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
            <div class="admin-field admin-field-full">
                <label>Imagine Produs</label>              
                <small style="color: #666;">Formate acceptate: JPG, PNG, GIF, WebP (max 2MB)</small>
                <input type="file" id="imagine_produs" name="imagine" accept="image/jpeg, image/png, image/gif, image/webp" class="form-control">               
            </div>
        </div>
        <button type="submit" class="btn-adauga">
            <i class="fas fa-plus"></i> Adaugă Produs
        </button>
    </form>
</div>

{{-- Lista produse --}}
<div class="admin-card">
    <h2>Produse Existente ({{ $produse->count() }})</h2>

    {{-- TABEL DESKTOP --}}
    <table class="admin-table desktop-only">
        <thead>
            <tr>
                <th>#</th>
                <th>Imagine</th>
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
                    <td>
                        @if($produs->imagine)
                            <img src="{{ asset('images/' . $produs->imagine) }}" alt="{{ $produs->nume }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                        @else
                            <span style="color: #999; font-size: 12px;">-</span>
                        @endif
                    </td>
                    <td>{{ $produs->nume }}</td>
                    <td>{{ $produs->pret }} lei</td>
                    <td><span class="cat-badge">{{ $produs->categorie }}</span></td>
                    <td>
                        <form method="POST" action="{{ route('admin.produse.sterge', $produs->id) }}" onsubmit="return confirm('Ștergi produsul?')" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sterge">
                                <i class="fas fa-trash"></i> Șterge
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- CARDURI MOBIL --}}
    <div class="mobile-only">
        @foreach($produse as $produs)
            <div class="mobile-card">
                <div class="mobile-card-header">
                    <span class="mobile-card-id">#{{ $produs->id }}</span>
                    <span class="cat-badge">{{ $produs->categorie }}</span>
                </div>

                @if($produs->imagine)
                <div style="width: 100%; height: 150px; margin-bottom: 12px; border-radius: 6px; overflow: hidden;">
                    <img src="{{ asset('images/' . $produs->imagine) }}" alt="{{ $produs->nume }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                @endif

                <div class="mobile-card-body">
                    <div class="mobile-card-row">
                        <i class="fas fa-utensils"></i>
                        <span><strong>{{ $produs->nume }}</strong></span>
                    </div>
                    <div class="mobile-card-row">
                        <i class="fas fa-tag"></i>
                        <span style="color:#e91e8c; font-weight:700">{{ $produs->pret }} lei</span>
                    </div>
                    @if($produs->descriere)
                        <div class="mobile-card-row">
                            <i class="fas fa-info-circle"></i>
                            <span>{{ $produs->descriere }}</span>
                        </div>
                    @endif
                    @if($produs->alergeni)
                        <div class="mobile-card-row">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span style="color:#b45309">{{ $produs->alergeni }}</span>
                        </div>
                    @endif
                </div>

                <div class="mobile-card-footer">
                    <form method="POST" action="{{ route('admin.produse.sterge', $produs->id) }}" onsubmit="return confirm('Ștergi produsul?')" style="width:100%">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-sterge" style="width:100%">
                            <i class="fas fa-trash"></i> Șterge Produs
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection