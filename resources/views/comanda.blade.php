@extends('layouts.app')

@section('title', 'Comandă Online')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/comanda.css') }}">
@endsection

@section('content')

<div class="comanda-page">

    <div class="comanda-header">
        <h1>Comandă Online</h1>
        <p>Livrare rapidă la domiciliu în Cahul</p>

        <div class="comanda-steps">
            <div class="step active" id="step1indicator">
                <div class="step-circle">1</div>
                <span>Selectează Produse</span>
            </div>
            <div class="step-line"></div>
            <div class="step" id="step2indicator">
                <div class="step-circle">2</div>
                <span>Informații Livrare</span>
            </div>
        </div>
    </div>

    @if($errors->any())
        <div class="comanda-error">
            <i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('comanda.store') }}" id="comandaForm">
        @csrf

        <div class="comanda-layout">

            {{-- STANGA — Produse --}}
            <div class="comanda-left">

                {{-- STEP 1 — Selectare produse --}}
                <div id="step1">
                    <h2 class="comanda-section-title">Selectează Produsele</h2>

                    {{-- Categorii tabs --}}
                    <div class="comanda-tabs">
                        <button type="button" class="tab-btn active" onclick="showCategory('bauturi_calde', this)">Băuturi Calde</button>
                        <button type="button" class="tab-btn" onclick="showCategory('cocktailuri', this)">Cocktailuri</button>
                        <button type="button" class="tab-btn" onclick="showCategory('lemonades', this)">Lemonades</button>
                        <button type="button" class="tab-btn" onclick="showCategory('deserturi', this)">Deserturi</button>
                        <button type="button" class="tab-btn" onclick="showCategory('inghetata', this)">Înghețată</button>
                    </div>

                    {{-- Produsele raman la fel ca in codul tau initial --}}
                    {{-- ... --}}
                    @foreach(['bauturi_calde' => $bauturiCalde, 'cocktailuri' => $cocktailuri, 'lemonades' => $lemonades, 'deserturi' => $deserturi, 'inghetata' => $inghetata] as $key => $categorisita)
                        <div class="comanda-products {{ $key != 'bauturi_calde' ? 'hidden' : '' }}" id="cat_{{ $key }}">
                            @foreach($categorisita as $produs)
                                <div class="comanda-product-item">
                                    <div class="product-info">
                                        <span class="product-name">{{ $produs->nume }}</span>
                                        <span class="product-pret">{{ number_format($produs->pret, 0) }} lei</span>
                                    </div>
                                    <button type="button" class="btn-add-product" onclick="addToCart({{ $produs->id }}, '{{ addslashes($produs->nume) }}', {{ $produs->pret }})">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    <button type="button" class="btn-continua" id="btnContinua" onclick="goToStep2()">
                        Continuă la Informații Livrare <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>

                {{-- STEP 2 — Informatii livrare --}}
                <div id="step2" class="hidden">
                    <h2 class="comanda-section-title">Informații Livrare</h2>

                    <div class="comanda-field">
                        <label><i class="fa-solid fa-user"></i> Nume Complet *</label>
                        <input type="text" name="nume" placeholder="Introduceți numele dvs." value="{{ old('nume') }}" required>
                    </div>

                    <div class="comanda-field">
                        <label><i class="fa-solid fa-phone"></i> Telefon *</label>
                        <input type="text" name="telefon" placeholder="0790 43 047" value="{{ old('telefon') }}" required>
                    </div>

                    <div class="comanda-field">
                        <label><i class="fa-solid fa-location-dot"></i> Adresă Livrare *</label>
                        <input type="text" name="adresa" placeholder="Strada, numărul casei, apartamentul" value="{{ old('adresa') }}" required>
                    </div>

                    <div class="comanda-field">
                        <label><i class="fa-solid fa-comment-dots"></i> Comentarii (opțional)</label>
                        <textarea name="comentarii" placeholder="Instrucțiuni speciale pentru livrare...">{{ old('comentarii') }}</textarea>
                    </div>

                    <div class="comanda-step2-buttons">
                        <button type="button" class="btn-inapoi" onclick="goToStep1()">
                            <i class="fa-solid fa-chevron-left"></i> Înapoi
                        </button>
                        <button type="submit" class="btn-plaseaza" id="btnPlaseaza">
                            <i class="fa-solid fa-cart-shopping"></i> Plasează Comanda
                        </button>
                    </div>
                </div>

            </div>

            {{-- DREAPTA — Cos --}}
            <div class="comanda-right">
                <div class="cos-container">
                    <h3 class="cos-title">Coșul Tău</h3>

                    <div id="cosGol" class="cos-gol">
                        <div class="cos-gol-icon"><i class="fa-solid fa-basket-shopping"></i></div>
                        <p>Coșul este gol</p>
                    </div>

                    <div id="cosItems"></div>

                    <div id="cosTotal" class="cos-total hidden">
                        <span>Total:</span>
                        <span id="totalPret" class="cos-total-pret">0 lei</span>
                    </div>

                    <div class="cos-info">
                        <p><i class="fa-solid fa-phone-volume"></i> Sau sună: <strong>0790 43 047</strong></p>
                        <p><i class="fa-solid fa-truck-fast"></i> Livrare gratuită în Cahul pentru comenzi peste 100 lei</p>
                    </div>
                </div>
            </div>

        </div>

        {{-- Hidden inputs pentru produse --}}
        <div id="hiddenInputs"></div>

    </form>

</div>

@endsection

@section('scripts')
<script>
// ... (functiile addToCart, removeFromCart, deleteFromCart raman la fel) ...

let cart = {};

function addToCart(id, nume, pret) {
    if (cart[id]) {
        cart[id].cantitate++;
    } else {
        cart[id] = { id, nume, pret, cantitate: 1 };
    }
    updateCart();
}

function removeFromCart(id) {
    if (cart[id]) {
        cart[id].cantitate--;
        if (cart[id].cantitate <= 0) {
            delete cart[id];
        }
    }
    updateCart();
}

function deleteFromCart(id) {
    delete cart[id];
    updateCart();
}

function updateCart() {
    const cosItems = document.getElementById('cosItems');
    const cosGol = document.getElementById('cosGol');
    const cosTotal = document.getElementById('cosTotal');
    const hiddenInputs = document.getElementById('hiddenInputs');
    const totalPret = document.getElementById('totalPret');
    const btnPlaseaza = document.getElementById('btnPlaseaza');

    cosItems.innerHTML = '';
    hiddenInputs.innerHTML = '';

    let total = 0;
    let hasItems = Object.keys(cart).length > 0;

    if (hasItems) {
        cosGol.classList.add('hidden');
        cosTotal.classList.remove('hidden');

        for (let id in cart) {
            const item = cart[id];
            total += item.pret * item.cantitate;

            cosItems.innerHTML += `
                <div class="cos-item">
                    <div class="cos-item-info">
                        <span class="cos-item-name">${item.nume}</span>
                        <span class="cos-item-pret">${item.pret} lei × ${item.cantitate}</span>
                    </div>
                    <div class="cos-item-controls">
                        <button type="button" onclick="removeFromCart(${id})"><i class="fa-solid fa-minus"></i></button>
                        <span>${item.cantitate}</span>
                        <button type="button" onclick="addToCart(${id}, '${item.nume}', ${item.pret})"><i class="fa-solid fa-plus"></i></button>
                        <button type="button" class="cos-delete" onclick="deleteFromCart(${id})"><i class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div>
            `;

            hiddenInputs.innerHTML += `<input type="hidden" name="produse[${id}]" value="${item.cantitate}">`;
        }

        totalPret.textContent = total + ' lei';

        if (btnPlaseaza) {
            btnPlaseaza.innerHTML = `<i class="fa-solid fa-cart-shopping"></i> Plasează Comanda (${total} lei)`;
        }
    } else {
        cosGol.classList.remove('hidden');
        cosTotal.classList.add('hidden');
    }
}

// ... restul functiilor showCategory, goToStep2, goToStep1 ramane la fel ...
function showCategory(category, btn) {
    document.querySelectorAll('.comanda-products').forEach(el => el.classList.add('hidden'));
    document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
    document.getElementById('cat_' + category).classList.remove('hidden');
    btn.classList.add('active');
}

function goToStep2() {
    if (Object.keys(cart).length === 0) {
        alert('Selectează cel puțin un produs!');
        return;
    }
    document.getElementById('step1').classList.add('hidden');
    document.getElementById('step2').classList.remove('hidden');
    document.getElementById('step1indicator').classList.remove('active');
    document.getElementById('step2indicator').classList.add('active');
    window.scrollTo(0, 0);
}

function goToStep1() {
    document.getElementById('step2').classList.add('hidden');
    document.getElementById('step1').classList.remove('hidden');
    document.getElementById('step2indicator').classList.remove('active');
    document.getElementById('step1indicator').classList.add('active');
    window.scrollTo(0, 0);
}
</script>
@endsection