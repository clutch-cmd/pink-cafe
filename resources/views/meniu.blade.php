@extends('layouts.app')

@section('title', 'Meniu')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/meniu.css') }}?v={{ time() }}">
    
@endsection

@section('content')

<div class="meniu-page">

    <div class="meniu-header">
        <h1>Meniul Nostru</h1>
        <p>Descoperă gama noastră variată de băuturi și deserturi delicioase</p>
    </div>

    {{-- LAYOUT: SIDEBAR + CONTINUT --}}
    <div class="meniu-layout">

        {{-- SIDEBAR FILTRE --}}
        <aside class="filter-sidebar">
            <div class="filter-sidebar-title">Categorii</div>

            <button class="filter-btn active" data-cat="all" onclick="filterCategory('all', this)">
                <span class="filter-btn-label"><i class="fa-solid fa-utensils"></i> Toate</span>
                <span class="filter-btn-count">{{ $bauturiCalde->count() + $cocktailuri->count() + $lemonades->count() + $deserturi->count() + $inghetata->count() + $sandvisuri->count() }}</span>
            </button>

            <button class="filter-btn" data-cat="bauturi_calde" onclick="filterCategory('bauturi_calde', this)">
                <span class="filter-btn-label"><i class="fa-solid fa-mug-saucer"></i> Băuturi Calde</span>
                <span class="filter-btn-count">{{ $bauturiCalde->count() }}</span>
            </button>

            <button class="filter-btn" data-cat="cocktailuri" onclick="filterCategory('cocktailuri', this)">
                <span class="filter-btn-label"><i class="fa-solid fa-glass-martini-alt"></i> Cocktailuri</span>
                <span class="filter-btn-count">{{ $cocktailuri->count() }}</span>
            </button>

            <button class="filter-btn" data-cat="lemonades" onclick="filterCategory('lemonades', this)">
                <span class="filter-btn-label"><i class="fa-solid fa-droplet"></i> Lemonades</span>
                <span class="filter-btn-count">{{ $lemonades->count() }}</span>
            </button>

            <button class="filter-btn" data-cat="deserturi" onclick="filterCategory('deserturi', this)">
                <span class="filter-btn-label"><i class="fa-solid fa-cake-candles"></i> Deserturi</span>
                <span class="filter-btn-count">{{ $deserturi->count() }}</span>
            </button>

            <button class="filter-btn" data-cat="inghetata" onclick="filterCategory('inghetata', this)">
                <span class="filter-btn-label"><i class="fa-solid fa-ice-cream"></i> Înghețată</span>
                <span class="filter-btn-count">{{ $inghetata->count() }}</span>
            </button>

            <button class="filter-btn" data-cat="sandvisuri_burgere" onclick="filterCategory('sandvisuri_burgere', this)">
                <span class="filter-btn-label"><i class="fa-solid fa-burger"></i> Sandvișuri & Burgere</span>
                <span class="filter-btn-count">{{ $sandvisuri->count() }}</span>
            </button>
        </aside>

        {{-- CONTINUT MENIU --}}
        <div class="meniu-content">

    {{-- BAUTURI CALDE --}}
    <div class="meniu-section" data-category="bauturi_calde">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-mug-saucer"></i></span> Băuturi Calde
        </h2>
        <div class="meniu-grid">
            @foreach($bauturiCalde as $produs)
                <a href="{{ route('produs.show', $produs->id) }}" class="meniu-item meniu-item-desert">
                    <div class="meniu-item-desert-info">
                        <span class="meniu-item-name">{!! $produs->nume !!}</span>
                        <span class="meniu-item-desc">{{ $produs->descriere }}</span>
                        
                    </div>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- COCKTAILURI --}}
    <div class="meniu-section" data-category="cocktailuri">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-glass-martini-alt"></i></span> Cocktailuri
        </h2>
        <div class="meniu-grid">
            @foreach($cocktailuri as $produs)
                <a href="{{ route('produs.show', $produs->id) }}" class="meniu-item meniu-item-desert">
                    <div class="meniu-item-desert-info">
                        <span class="meniu-item-name">{!! $produs->nume !!}</span>
                        <span class="meniu-item-desc">{{ $produs->descriere }}</span>
                       
                    </div>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- LEMONADES --}}
    <div class="meniu-section" data-category="lemonades">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-droplet"></i></span> Fresh Lemonades
        </h2>
        <div class="meniu-grid">
            @foreach($lemonades as $produs)
                <a href="{{ route('produs.show', $produs->id) }}" class="meniu-item meniu-item-desert">
                    <div class="meniu-item-desert-info">
                        <span class="meniu-item-name">{!! $produs->nume !!}</span>
                        <span class="meniu-item-desc">{{ $produs->descriere }}</span>
                        
                    </div>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- DESERTURI --}}
    <div class="meniu-section" data-category="deserturi">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-cake-candles"></i></span> Deserturi
        </h2>
        <div class="meniu-grid meniu-grid-2">
            @foreach($deserturi as $produs)
                <a href="{{ route('produs.show', $produs->id) }}" class="meniu-item meniu-item-desert">
                    <div class="meniu-item-desert-info">
                        <span class="meniu-item-name">{!! $produs->nume !!}</span>
                        <span class="meniu-item-desc">{{ $produs->descriere }}</span>
                        
                    </div>
                    <div class="meniu-item-right">
                        <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                        <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- SANDVISURI & BURGERE --}}
    <div class="meniu-section" data-category="sandvisuri_burgere">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-burger"></i></span> Sandvișuri & Burgere
        </h2>
        <div class="meniu-grid meniu-grid-2">
            @foreach($sandvisuri as $produs)
                <div class="meniu-item-wrapper">
                    <a href="{{ route('produs.show', $produs->id) }}" class="meniu-item meniu-item-desert">
                        <div class="meniu-item-desert-info">
                            <span class="meniu-item-name">{!! $produs->nume !!}</span>
                            <span class="meniu-item-desc">{{ $produs->descriere }}</span>
                            
                        </div>
                        <div class="meniu-item-right">
                            <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                            <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    {{-- INGHETATA --}}
    <div class="meniu-section" data-category="inghetata">
        <h2 class="meniu-category-title">
            <span class="meniu-icon"><i class="fa-solid fa-ice-cream"></i></span> Înghețată
        </h2>
        <div class="meniu-grid">
            @foreach($inghetata as $produs)
                <a href="{{ route('produs.show', $produs->id) }}" class="meniu-item meniu-item-desert">
                        <div class="meniu-item-desert-info">
                            <span class="meniu-item-name">{!! $produs->nume !!}</span>
                            <span class="meniu-item-desc">{{ $produs->descriere }}</span>
                           
                        </div>
                        <div class="meniu-item-right">
                            <span class="meniu-item-pret">{{ number_format($produs->pret, 0) }} lei</span>
                            <i class="fa-solid fa-circle-info" style="color:#e91e8c;"></i>
                        </div>
                    </a>
            @endforeach
        </div>
    </div>

        </div>
        {{-- /meniu-content --}}

    </div>
    {{-- /meniu-layout --}}

</div>

<script>
function filterCategory(category, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    document.querySelectorAll('.meniu-section').forEach(section => {
        const cat = section.getAttribute('data-category');
        if (category === 'all' || cat === category) {
            section.classList.remove('hidden-cat');
            section.style.opacity = '1';
        } else {
            section.classList.add('hidden-cat');
            section.style.opacity = '0';
        }
    });
}
</script>

@endsection