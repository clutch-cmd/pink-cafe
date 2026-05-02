@extends('layouts.app')

@section('title', 'Meniu')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/meniu.css') }}">
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
            <i class="fa-solid fa-mug-saucer" style="color: #e91e63; margin-right: 10px;"></i> Băuturi Calde
        </h2>
        <div class="meniu-grid">
            @foreach($bauturiCalde as $produs)
                <div class="meniu-item" onclick="openModal({{ $produs->id }})">
                    <span class="meniu-item-name">{{ $produs->nume }}</span>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color: #e91e63; margin-left: 8px; font-size: 14px;"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- COCKTAILURI --}}
    <div class="meniu-section">
        <h2 class="meniu-category-title">
            <i class="fa-solid fa-glass-martini-alt" style="color: #e91e63; margin-right: 10px;"></i> Cocktailuri
        </h2>
        <div class="meniu-grid">
            @foreach($cocktailuri as $produs)
                <div class="meniu-item" onclick="openModal({{ $produs->id }})">
                    <span class="meniu-item-name">{{ $produs->nume }}</span>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color: #e91e63; margin-left: 8px; font-size: 14px;"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- LEMONADES --}}
    <div class="meniu-section">
        <h2 class="meniu-category-title">
            <i class="fa-solid fa-droplet" style="color: #e91e63; margin-right: 10px;"></i> Fresh Lemonades
        </h2>
        <div class="meniu-grid">
            @foreach($lemonades as $produs)
                <div class="meniu-item" onclick="openModal({{ $produs->id }})">
                    <span class="meniu-item-name">{{ $produs->nume }}</span>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color: #e91e63; margin-left: 8px; font-size: 14px;"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- DESERTURI --}}
    <div class="meniu-section">
        <h2 class="meniu-category-title">
            <i class="fa-solid fa-cake-candles" style="color: #e91e63; margin-right: 10px;"></i> Deserturi
    </h2>
        </h2>
        <div class="meniu-grid meniu-grid-2">
            @foreach($deserturi as $produs)
                <div class="meniu-item meniu-item-desert" onclick="openModal({{ $produs->id }})">
                    <div class="meniu-item-desert-info">
                        <span class="meniu-item-name">{{ $produs->nume }}</span>
                        @if($produs->alergeni)
                            <span class="meniu-item-alergeni">{{ $produs->alergeni }}</span>
                        @endif
                    </div>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color: #e91e63; margin-left: 8px; font-size: 14px;"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

{{-- MODAL --}}
<div class="modal-overlay" id="modalOverlay" onclick="closeModal()">
    <div class="modal-box" onclick="event.stopPropagation()">
        <div class="modal-header" id="modalHeader">
            <button class="modal-close" onclick="closeModal()">✕</button>
            <div class="modal-header-icon" id="modalIcon"></div>
            <h3 class="modal-title" id="modalTitle"></h3>
        </div>
        <div class="modal-body">
            <div class="modal-meta">
                <span class="modal-categorie" id="modalCategorie"></span>
                <span class="modal-pret" id="modalPret"></span>
            </div>
            <div class="modal-section" id="modalDescriereSection">
                <h4>Descriere</h4>
                <p id="modalDescriere"></p>
            </div>
            <div class="modal-section" id="modalIngredienteSection">
                <h4>Ingrediente</h4>
                <p id="modalIngrediente"></p>
            </div>
            <div class="modal-alergeni" id="modalAlergeniSection">
                <span class="modal-alergeni-icon">⚠️</span>
                <div>
                    <strong>Alergeni</strong>
                    <p id="modalAlergeni"></p>
                </div>
            </div>
           
        </div>
    </div>
</div>

{{-- DATE PRODUSE PENTRU JS --}}
<script>
const produse = {
    @foreach(array_merge($bauturiCalde->all(), $cocktailuri->all(), $lemonades->all(), $deserturi->all()) as $produs)
    {{ $produs->id }}: {
        nume: "{{ addslashes($produs->nume) }}",
        pret: {{ $produs->pret }},
        categorie: "{{ $produs->categorie }}",
        descriere: "{{ addslashes($produs->descriere ?? '') }}",
        ingrediente: "{{ addslashes($produs->ingrediente ?? '') }}",
        alergeni: "{{ addslashes($produs->alergeni ?? '') }}"
    },
    @endforeach
};
const categorieLabel = {
    'bauturi_calde': 'Băuturi Calde',
    'cocktailuri': 'Cocktailuri',
    'lemonades': 'Fresh Lemonades',
    'deserturi': 'Deserturi'
};

// Aici am schimbat emoji-urile cu iconițele Font Awesome
const categorieIconHTML = {
    'bauturi_calde': '<i class="fa-solid fa-mug-saucer"></i>',
    'cocktailuri': '<i class="fa-solid fa-glass-martini-alt"></i>',
    'lemonades': '<i class="fa-solid fa-droplet"></i>',
    'deserturi': '<i class="fa-solid fa-cake-candles"></i>'
};

function openModal(id) {
    const p = produse[id];
    if (!p) return;

    // Folosim .innerHTML în loc de .textContent pentru nume ca să reparăm simbolul "&"
    document.getElementById('modalTitle').innerHTML = p.nume;
    
    // Folosim .innerHTML pentru a insera tag-ul <i> de Font Awesome
    document.getElementById('modalIcon').innerHTML = categorieIconHTML[p.categorie];
    
    document.getElementById('modalCategorie').textContent = categorieLabel[p.categorie].toUpperCase();
    document.getElementById('modalPret').textContent = p.pret + ' lei';

    // Reparăm și restul câmpurilor pentru orice eventualitate
    if (p.descriere) {
        document.getElementById('modalDescriere').innerHTML = p.descriere;
        document.getElementById('modalDescriereSection').style.display = 'block';
    } else {
        document.getElementById('modalDescriereSection').style.display = 'none';
    }

    if (p.ingrediente) {
        document.getElementById('modalIngrediente').innerHTML = p.ingrediente;
        document.getElementById('modalIngredienteSection').style.display = 'block';
    } else {
        document.getElementById('modalIngredienteSection').style.display = 'none';
    }

    if (p.alergeni) {
        document.getElementById('modalAlergeni').innerHTML = p.alergeni;
        document.getElementById('modalAlergeniSection').style.display = 'flex';
    } else {
        document.getElementById('modalAlergeniSection').style.display = 'none';
    }

    document.getElementById('modalOverlay').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    document.getElementById('modalOverlay').classList.remove('active');
    document.body.style.overflow = '';
}

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeModal();
});
</script>

@endsection