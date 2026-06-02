@extends('layouts.app')

@section('title', 'Meniu')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/meniu.css') }}?v=2">
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
                <div class="meniu-item" onclick="openModal({{ $produs->id }})">
                    <span class="meniu-item-name">{!! $produs->nume !!}</span>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </div>
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
                <div class="meniu-item" onclick="openModal({{ $produs->id }})">
                    <span class="meniu-item-name">{!! $produs->nume !!}</span>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </div>
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
                <div class="meniu-item" onclick="openModal({{ $produs->id }})">
                    <span class="meniu-item-name">{!! $produs->nume !!}</span>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </div>
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
                <div class="meniu-item meniu-item-desert" onclick="openModal({{ $produs->id }})">
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
                </div>
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
                <div class="meniu-item" onclick="openModal({{ $produs->id }})">
                    <span class="meniu-item-name">{!! $produs->nume !!}</span>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

{{-- MODAL ADAPTABIL --}}
<div class="modal-overlay" id="modalOverlay" onclick="closeModal()">
    <div class="modal-box" onclick="event.stopPropagation()">
        
        <div class="modal-header" id="modalHeader">
    <button class="modal-close" onclick="closeModal()">✕</button>

    <img id="modalImagine" src="" alt="" class="modal-product-img">
    
    <div id="modalIcon" class="modal-product-icon"></div>
    <h3 class="modal-title" id="modalTitle"></h3>
</div>
        
        <div class="modal-body">
            <div class="modal-meta">
                <span class="modal-categorie" id="modalCategorie"></span>
                <span class="modal-pret" id="modalPret"></span>
            </div>
            <div class="modal-alergeni" id="modalAlergeniSection">
                <i class="fa-solid fa-triangle-exclamation" style="color: rgb(255, 212, 59);"></i>
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
    @foreach(array_merge(
        $bauturiCalde->all(),
        $cocktailuri->all(),
        $lemonades->all(),
        $deserturi->all(),
        $inghetata->all()
    ) as $produs)
    {{ $produs->id }}: {
        nume: "{{ addslashes($produs->nume) }}",
        pret: {{ $produs->pret }},
        categorie: "{{ $produs->categorie }}",
        imagine: "{{ $produs->imagine ?? '' }}", 
        alergeni: "{{ addslashes($produs->alergeni ?? '') }}"
    },
    @endforeach
};

const categorieLabel = {
    'bauturi_calde': 'Băuturi Calde',
    'cocktailuri': 'Cocktailuri',
    'lemonades': 'Fresh Lemonades',
    'deserturi': 'Deserturi',
    'inghetata': 'Înghețată'
};

const categorieIconHTML = {
    'bauturi_calde': '<i class="fa-solid fa-mug-saucer" style="color: rgb(255, 255, 255);"></i>',
    'cocktailuri': '<i class="fa-solid fa-glass-martini-alt" style="color: rgb(255, 255, 255);"></i>',
    'lemonades': '<i class="fa-solid fa-droplet" style="color: rgb(255, 255, 255);"></i>',
    'deserturi': '<i class="fa-solid fa-cake-candles" style="color: rgb(255, 255, 255);"></i>',
    'inghetata': '<i class="fa-solid fa-ice-cream" style="color: rgb(255, 255, 255);"></i>'
};

function openModal(id) {
    const p = produse[id];
    if (!p) return;

    const modalHeader = document.getElementById('modalHeader');
    const modalImagine = document.getElementById('modalImagine');
    const modalIcon = document.getElementById('modalIcon');

    if (p.imagine && p.imagine.trim() !== '') {
        // Înărcăm imaginea nativă în etichetă
        modalImagine.src = '/images/' + p.imagine;
        modalImagine.alt = p.nume;
        
        // Comutăm afișajele
        modalImagine.style.display = 'block';
        modalIcon.style.display = 'none';
        
        // Schimbăm comportamentul header-ului
        modalHeader.classList.remove('default-gradient');
        modalHeader.classList.add('has-image-layout');
    } else {
        // Resetăm pentru produsele simple cu iconiță
        modalImagine.style.display = 'none';
        modalIcon.style.display = 'block';
        modalIcon.innerHTML = categorieIconHTML[p.categorie];
        
        modalHeader.classList.add('default-gradient');
        modalHeader.classList.remove('has-image-layout');
    }
    
    document.getElementById('modalTitle').innerHTML = p.nume;
    document.getElementById('modalCategorie').textContent = categorieLabel[p.categorie].toUpperCase();
    document.getElementById('modalPret').textContent = p.pret + ' lei';

    if (p.alergeni) {
        document.getElementById('modalAlergeni').textContent = p.alergeni;
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