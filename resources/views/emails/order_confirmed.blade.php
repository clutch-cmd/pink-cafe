<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        h2 { color: #e91e63; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #fce4ec; color: #e91e63; }
        .total { font-size: 18px; font-weight: bold; color: #e91e63; }
        .detalii-rezervare { background: #fff3e0; padding: 15px; border-radius: 8px; margin: 15px 0; }
        .detalii-comanda { background: #e8f5e9; padding: 15px; border-radius: 8px; margin: 15px 0; }
        .mentiuni { background: #f3e5f5; padding: 15px; border-radius: 8px; margin: 15px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Mulțumim pentru comandă, {{ $comanda->nume }}! 🎉</h2>
        <p>Comanda ta a fost înregistrată cu succes la <strong>PINK CAFÉ</strong>.</p>

        <hr>

        <div class="detalii-comanda">
            <h3>📋 Detalii comandă</h3>
            <p><strong>Nr. comandă:</strong> #{{ $comanda->id }}</p>
            <p><strong>Data plasării:</strong> {{ $comanda->created_at->format('d.m.Y H:i') }}</p>
            <p><strong>Adresă livrare:</strong> {{ $comanda->adresa }}</p>
            <p><strong>Telefon contact:</strong> {{ $comanda->telefon }}</p>
        </div>

        @if($comanda->data_rezervare || $comanda->ora_rezervare)
        <div class="detalii-rezervare">
            <h3>🍽️ Rezervare masă</h3>
            <p><strong>Data rezervării:</strong> {{ $comanda->data_rezervare ? $comanda->data_rezervare->format('d.m.Y') : '-' }}</p>
            <p><strong>Ora rezervării:</strong> {{ $comanda->ora_rezervare ?? '-' }}</p>
            @if($comanda->numar_persoane)
            <p><strong>Număr persoane:</strong> {{ $comanda->numar_persoane }}</p>
            @endif
        </div>
        @endif

        @if($comanda->mentiuni)
        <div class="mentiuni">
            <h3>📝 Mențiuni</h3>
            <p>{{ $comanda->mentiuni }}</p>
        </div>
        @endif

        <hr>

        <h3>🛒 Produse comandate</h3>
        <table>
            <tr>
                <th>Produs</th>
                <th>Cantitate</th>
                <th>Preț</th>
            </tr>
            @foreach($comanda->produse as $produs)
            <tr>
                <td>{{ $produs->nume }}</td>
                <td>{{ $produs->pivot->cantitate }} buc</td>
                <td>{{ number_format($produs->pivot->pret, 2) }} lei</td>
            </tr>
            @endforeach
        </table>

        <br>

        <p class="total">Total: {{ number_format($comanda->total, 2) }} lei</p>

        <p>Status: <strong>În pregătire</strong> ☕</p>

        <hr>

        <p style="text-align: center; color: #888;">
            PINK CAFÉ • Calea Republicii 24a, nr. 4 • Telefon: 0790 43 047<br>
            <small>Îți mulțumim că ne-ai ales!</small>
        </p>
    </div>
</body>
</html>