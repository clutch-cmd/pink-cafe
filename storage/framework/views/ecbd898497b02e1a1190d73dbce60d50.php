<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { 
            font-family: Arial, 
            sans-serif; color: #333; 
            line-height: 1.6; 
        }
        .container { 
            max-width: 600px; 
            margin: 0 auto; 
            padding: 20px; 
        }
        h2 { 
            color: #e91e63; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin: 15px 0; 
        }
        th, td { 
            padding: 10px; 
            text-align: left; 
            border-bottom: 1px solid #ddd; 
        }
        th { 
            background: #fce4ec; 
            color: #e91e63; 
        }
        .total { 
            font-size: 18px; 
            font-weight: bold; 
            color: #e91e63; 
        }
        .cancelled-box { 
            background: #ffebee; 
            padding: 20px; 
            border-radius: 8px; 
            text-align: center; 
            margin: 15px 0; 
            border: 2px solid #ef5350; 
        }
        .detalii { 
            background: #f5f5f5; 
            padding: 15px; 
            border-radius: 8px; 
            margin: 15px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="cancelled-box">
            <h2>Comanda a fost anulată ❌</h2>
            <p>Bună, <strong><?php echo e($comanda->nume); ?></strong>.</p>
            <p>Comanda <strong>#<?php echo e($comanda->id); ?></strong> a fost anulată.</p>
            <p>Ne pare rău să te vedem plecând. Te așteptăm oricând la Pink Cafe! 💗</p>
        </div>
        <hr>
        <div class="detalii">
            <h3>📋 Detalii comandă anulată</h3>
            <p><strong>Data plasării:</strong> <?php echo e($comanda->created_at->format('d.m.Y H:i')); ?></p>
            <p><strong>Adresă livrare:</strong> <?php echo e($comanda->adresa); ?></p>
            <p><strong>Telefon:</strong> <?php echo e($comanda->telefon); ?></p>
            <?php if($comanda->data_rezervare || $comanda->ora_rezervare): ?>
            <p><strong>Rezervare:</strong> <?php echo e($comanda->data_rezervare ? $comanda->data_rezervare->format('d.m.Y') : '-'); ?> la <?php echo e($comanda->ora_rezervare ?? '-'); ?></p>
            <?php endif; ?>
            <?php if($comanda->numar_persoane): ?>
            <p><strong>Persoane:</strong> <?php echo e($comanda->numar_persoane); ?></p>
            <?php endif; ?>
        </div>
        <h3>🛒 Produse comandate</h3>
        <table>
            <tr>
                <th>Produs</th>
                <th>Cantitate</th>
                <th>Preț</th>
            </tr>
            <?php $__currentLoopData = $comanda->produse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($produs->nume); ?></td>
                <td><?php echo e($produs->pivot->cantitate); ?> buc</td>
                <td><?php echo e(number_format($produs->pivot->pret, 2)); ?> lei</td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <br>
        <p class="total">Total: <?php echo e(number_format($comanda->total, 2)); ?> lei</p>
        <hr>
        <p style="text-align: center; color: #888;">
            Pink Cafe • Strada Ta • Telefon: 0123 456 789<br>
            <small>Te așteptăm cu drag data viitoare!</small>
        </p>
    </div>
</body>
</html><?php /**PATH D:\pinkcafe\resources\views/emails/order_cancelled.blade.php ENDPATH**/ ?>