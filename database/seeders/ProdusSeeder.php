<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdusSeeder extends Seeder
{
    public function run()
    {
        // Dezactivăm verificarea cheilor străine pentru a putea curăța tabelele
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('produse')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $produse = [
            ['nume' => 'Ristretto', 'pret' => 25, 'categorie' => 'bauturi_calde', 'descriere' => 'Espresso concentrat și puternic', 'ingrediente' => 'Cafea arabică 100%', 'alergeni' => null, 'imagine' => 'ristretto.jpg'],
            ['nume' => 'Espresso', 'pret' => 25, 'categorie' => 'bauturi_calde', 'descriere' => 'Cafea clasică italiană', 'ingrediente' => 'Cafea arabică premium', 'alergeni' => null, 'imagine' => 'espresso.jpg'],
            ['nume' => 'Doppio', 'pret' => 40, 'categorie' => 'bauturi_calde', 'descriere' => 'Espresso dublu pentru energizare maximă', 'ingrediente' => 'Cafea arabică dublă porție', 'alergeni' => null, 'imagine' => 'doppio.jpg'],
            ['nume' => 'Flat White', 'pret' => 50, 'categorie' => 'bauturi_calde', 'descriere' => 'Cafea cremoasă cu lapte microspumat', 'ingrediente' => 'Espresso, lapte integral', 'alergeni' => null, 'imagine' => 'flat_white.jpg'],
            ['nume' => 'Americano', 'pret' => 27, 'categorie' => 'bauturi_calde', 'descriere' => 'Espresso alungit cu apă caldă', 'ingrediente' => 'Espresso, apă fierbinte', 'alergeni' => null, 'imagine' => 'americano.jpg'],
            ['nume' => 'Cappuccino', 'pret' => 35, 'categorie' => 'bauturi_calde', 'descriere' => 'Echilibrul perfect între cafea și spumă', 'ingrediente' => 'Espresso, lapte, spumă de lapte', 'alergeni' => null, 'imagine' => 'cappuccino.jpg'],
            ['nume' => 'Latte', 'pret' => 40, 'categorie' => 'bauturi_calde', 'descriere' => 'Cafea delicată cu mult lapte', 'ingrediente' => 'Espresso, lapte vaporat', 'alergeni' => null, 'imagine' => 'latte.jpg'],
            ['nume' => 'Grand Cappuccino', 'pret' => 45, 'categorie' => 'bauturi_calde', 'descriere' => 'Cappuccino în dimensiune XXL', 'ingrediente' => 'Espresso dublu, lapte, spumă', 'alergeni' => null, 'imagine' => 'grand_cappuccino.jpg'],
            ['nume' => 'RAF', 'pret' => 55, 'categorie' => 'bauturi_calde', 'descriere' => 'Cafea dulce și cremoasă stil rusesc', 'ingrediente' => 'Espresso, cremă, zahăr vanilat', 'alergeni' => null, 'imagine' => 'raf.jpg'],
            ['nume' => 'Cacao', 'pret' => 35, 'categorie' => 'bauturi_calde', 'descriere' => 'Ciocolată caldă clasică', 'ingrediente' => 'Cacao natural, lapte, zahăr', 'alergeni' => null, 'imagine' => 'cacao.jpg'],
            ['nume' => 'Hot Chocolate', 'pret' => 40, 'categorie' => 'bauturi_calde', 'descriere' => 'Ciocolată premium extra-cremoasă', 'ingrediente' => 'Ciocolată belgiană, lapte, frișcă', 'alergeni' => null, 'imagine' => 'hot_chocolate.jpg'],
            ['nume' => 'Tea Assam India', 'pret' => 25, 'categorie' => 'bauturi_calde', 'descriere' => 'Ceai negru Assam din India', 'ingrediente' => 'Ceai Assam premium', 'alergeni' => null, 'imagine' => 'tea_assam.jpg'],
            ['nume' => 'Tea Earl Grey Traditional Blend', 'pret' => 25, 'categorie' => 'bauturi_calde', 'descriere' => 'Ceai Earl Grey tradițional', 'ingrediente' => 'Ceai negru Earl Grey', 'alergeni' => null, 'imagine' => 'tea_earl_grey.jpg'],
            ['nume' => 'Tea China Green Jasmine', 'pret' => 25, 'categorie' => 'bauturi_calde', 'descriere' => 'Ceai verde chinezesc cu jasmină', 'ingrediente' => 'Ceai verde cu flori de jasmină', 'alergeni' => null, 'imagine' => 'tea_green_jasmine.jpg'],
            ['nume' => 'Tea Green Fresh Lemon Mint', 'pret' => 25, 'categorie' => 'bauturi_calde', 'descriere' => 'Ceai verde cu lămâie și mentă', 'ingrediente' => 'Ceai verde, lămâie, mentă', 'alergeni' => null, 'imagine' => 'tea_lemon_mint.jpg'],
            ['nume' => 'Tea Fruit Symphony', 'pret' => 25, 'categorie' => 'bauturi_calde', 'descriere' => 'Ceai cu mix de fructe', 'ingrediente' => 'Ceai cu fructe uscate', 'alergeni' => null, 'imagine' => 'tea_fruit.jpg'],
            ['nume' => 'Tea Rosehip & Hibiscus', 'pret' => 25, 'categorie' => 'bauturi_calde', 'descriere' => 'Ceai cu șofran și hibiscus', 'ingrediente' => 'Șofran, hibiscus', 'alergeni' => null, 'imagine' => 'tea_rosehip.jpg'],
            ['nume' => 'Tea Herbal Symphony', 'pret' => 25, 'categorie' => 'bauturi_calde', 'descriere' => 'Ceai din plante medicinale', 'ingrediente' => 'Mix de plante uscate', 'alergeni' => null, 'imagine' => 'tea_herbal.jpg'],
            ['nume' => 'Tea Camomile', 'pret' => 25, 'categorie' => 'bauturi_calde', 'descriere' => 'Ceai din flori de cămilă', 'ingrediente' => 'Flori de cămilă', 'alergeni' => null, 'imagine' => 'tea_camomile.jpg'],
            ['nume' => 'Tea Refreshing Mint', 'pret' => 25, 'categorie' => 'bauturi_calde', 'descriere' => 'Ceai racoritor din mentă', 'ingrediente' => 'Mentă proaspătă', 'alergeni' => null, 'imagine' => 'tea_mint.jpg'],
            ['nume' => 'Cappuccino Brulee', 'pret' => 45, 'categorie' => 'bauturi_calde', 'descriere' => 'Cappuccino cu crustă caramelizată', 'ingrediente' => 'Espresso, lapte, zahăr brulat', 'alergeni' => null, 'imagine' => 'cappuccino_brulee.jpg'],
            ['nume' => 'Bounty Coffee', 'pret' => 50, 'categorie' => 'bauturi_calde', 'descriere' => 'Cafea cu aromă de cocos și ciocolată', 'ingrediente' => 'Espresso, sirop cocos, lapte, ciocolată', 'alergeni' => null, 'imagine' => 'bounty_coffee.jpg'],
            ['nume' => 'Matcha', 'pret' => 50, 'categorie' => 'bauturi_calde', 'descriere' => 'Ceai verde japonez ceremonial', 'ingrediente' => 'Matcha premium, lapte', 'alergeni' => null, 'imagine' => 'matcha.jpg'],
            ['nume' => 'Aperol Spritz', 'pret' => 80, 'categorie' => 'cocktailuri', 'descriere' => 'Cocktail italian răcoritor', 'ingrediente' => 'Aperol, prosecco, sifon, portocală', 'alergeni' => 'alcool', 'imagine' => 'aperol_spritz.jpg'],
            ['nume' => 'Strawberry Aperol', 'pret' => 85, 'categorie' => 'cocktailuri', 'descriere' => 'Aperol Spritz cu căpșuni proaspete', 'ingrediente' => 'Aperol, prosecco, căpșuni, sifon', 'alergeni' => 'alcool', 'imagine' => 'strawberry_aperol.jpg'],
            ['nume' => 'Pina Colada', 'pret' => 90, 'categorie' => 'cocktailuri', 'descriere' => 'Cocktail exotic cu ananas și cocos', 'ingrediente' => 'Rom alb, cremă cocos, suc ananas', 'alergeni' => 'alcool, nuci', 'imagine' => 'pina_colada.jpg'],
            ['nume' => 'Pornstar Martini', 'pret' => 90, 'categorie' => 'cocktailuri', 'descriere' => 'Cocktail elegant cu fructul pasiunii', 'ingrediente' => 'Vodcă, lichior passion fruit, vanilie, prosecco', 'alergeni' => 'alcool', 'imagine' => 'pornstar_martini.jpg'],
            ['nume' => 'Mojito', 'pret' => 80, 'categorie' => 'cocktailuri', 'descriere' => 'Cocktail cubanez cu mentă', 'ingrediente' => 'Rom alb, mentă, lime, zahăr, sifon', 'alergeni' => 'alcool', 'imagine' => 'mojito.jpg'],
            ['nume' => 'Lemonade Passion Fruit', 'pret' => 50, 'categorie' => 'lemonades', 'descriere' => 'Lemonadă cu fructul pasiunii', 'ingrediente' => 'Fruct pasiunii, lămâie, zahăr, apă', 'alergeni' => null, 'imagine' => 'lemonade_passion.jpg'],
            ['nume' => 'Lemonade Banana', 'pret' => 50, 'categorie' => 'lemonades', 'descriere' => 'Lemonadă exotică cu banane', 'ingrediente' => 'Banane, lămâie, zahăr, apă', 'alergeni' => null, 'imagine' => 'lemonade_banana.jpg'],
            ['nume' => 'Lemonade Strawberry', 'pret' => 50, 'categorie' => 'lemonades', 'descriere' => 'Lemonadă dulce cu căpșuni', 'ingrediente' => 'Căpșuni proaspete, lămâie, zahăr, apă', 'alergeni' => null, 'imagine' => 'lemonade_strawberry.jpg'],
            ['nume' => 'Lemonade Kiwi', 'pret' => 50, 'categorie' => 'lemonades', 'descriere' => 'Lemonadă acră cu kiwi', 'ingrediente' => 'Kiwi, lămâie, zahăr, apă', 'alergeni' => null, 'imagine' => 'lemonade_kiwi.jpg'],
            ['nume' => 'Lemonade Mango', 'pret' => 50, 'categorie' => 'lemonades', 'descriere' => 'Lemonadă tropicală cu mango', 'ingrediente' => 'Mango, lămâie, zahăr, apă', 'alergeni' => null, 'imagine' => 'lemonade_mango.jpg'],
            ['nume' => 'Fresh Portocala', 'pret' => 65, 'categorie' => 'lemonades', 'descriere' => 'Suc proaspăt de portocale', 'ingrediente' => 'Portocale 100% naturale', 'alergeni' => null, 'imagine' => 'fresh_portocala.jpg'],
            ['nume' => 'Fresh Grapefruit', 'pret' => 65, 'categorie' => 'lemonades', 'descriere' => 'Suc proaspăt de grapefruit', 'ingrediente' => 'Grapefruit roz 100% natural', 'alergeni' => null, 'imagine' => 'fresh_grapefruit.jpg'],
            ['nume' => 'Inima', 'pret' => 60, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură romantică în formă de inimă', 'ingrediente' => 'Cremă mascarpone, căpșuni, blat roșu', 'alergeni' => null, 'imagine' => 'inima.jpg'],
            ['nume' => 'Rosa', 'pret' => 60, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură roz cu notițe florale', 'ingrediente' => 'Cremă roz, fructe de bosesc', 'alergeni' => null, 'imagine' => 'rosa.jpg'],
            ['nume' => 'Dimineata de Vara', 'pret' => 65, 'categorie' => 'deserturi', 'descriere' => 'Desert fresh cu fructe de vară', 'ingrediente' => 'Cremă iaurt, fructe sezon, blat vanilie', 'alergeni' => null, 'imagine' => 'dimineata_vara.jpg'],
            ['nume' => 'Cub de Ciocolata', 'pret' => 70, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură intensă de ciocolată', 'ingrediente' => 'Ciocolată neagră, mousse cacao, blat brownie', 'alergeni' => null, 'imagine' => 'cub_ciocolata.jpg'],
            ['nume' => 'Three Chocolates', 'pret' => 70, 'categorie' => 'deserturi', 'descriere' => 'Trei straturi de ciocolată premium', 'ingrediente' => 'Ciocolată albă, lapte, neagră, blat cacao', 'alergeni' => null, 'imagine' => 'three_chocolates.jpg'],
            ['nume' => 'Mochi Capsuna', 'pret' => 55, 'categorie' => 'deserturi', 'descriere' => 'Mochi dulce cu căpșuni', 'ingrediente' => 'Orez mochi, cremă căpșuni proaspete', 'alergeni' => null, 'imagine' => 'mochi_capsuna.jpg'],
            ['nume' => 'Mochi Snickers', 'pret' => 55, 'categorie' => 'deserturi', 'descriere' => 'Mochi inspirat din Snickers', 'ingrediente' => 'Orez mochi, caramel, arahide, ciocolată', 'alergeni' => null, 'imagine' => 'mochi_snickers.jpg'],
            ['nume' => 'Mochi Lamaie', 'pret' => 55, 'categorie' => 'deserturi', 'descriere' => 'Mochi proaspăt cu lămâie', 'ingrediente' => 'Orez mochi, cremă lămâie, zeste citrice', 'alergeni' => null, 'imagine' => 'mochi_lamaie.jpg'],
            ['nume' => 'Fructe de Padure', 'pret' => 70, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură cu fructe de pădure', 'ingrediente' => 'Afine, mure, zmeură, cremă, blat', 'alergeni' => null, 'imagine' => 'fructe_padure.jpg'],
            ['nume' => 'Malibu', 'pret' => 70, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură cu aromă de cocos și rom', 'ingrediente' => 'Cremă Malibu, cocos, blat umed', 'alergeni' => null, 'imagine' => 'malibu.jpg'],
            ['nume' => 'Lamaie', 'pret' => 65, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură proaspătă de lămâie', 'ingrediente' => 'Lemon curd, cremă, blat vanilie', 'alergeni' => null, 'imagine' => 'lamaie.jpg'],
            ['nume' => 'Para', 'pret' => 65, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură delicată cu pere', 'ingrediente' => 'Pere caramelizate, cremă vanilie, blat', 'alergeni' => null, 'imagine' => 'para.jpg'],
            ['nume' => 'Mar', 'pret' => 65, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură cu mere și scorțișoară', 'ingrediente' => 'Mere, scorțișoară, nuci, cremă', 'alergeni' => null, 'imagine' => 'mar.jpg'],
            ['nume' => 'Mango & Fructul Pasiunii', 'pret' => 75, 'categorie' => 'deserturi', 'descriere' => 'Desert exotic cu mango și passion fruit', 'ingrediente' => 'Mango, fruct pasiunii, mousse, blat', 'alergeni' => null, 'imagine' => 'mango_pasiune.jpg'],
            ['nume' => 'Mango & Ananas', 'pret' => 65, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură tropicală cu două fructe', 'ingrediente' => 'Mango, ananas, cremă, blat', 'alergeni' => null, 'imagine' => 'mango_ananas.jpg'],
            ['nume' => 'Zmeura', 'pret' => 70, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură proaspătă cu zmeură', 'ingrediente' => 'Zmeură proaspătă, mousse, blat vanilie', 'alergeni' => null, 'imagine' => 'zmeura.jpg'],
            ['nume' => 'Coacaza & Visna', 'pret' => 70, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură cu coacăză și vișnă', 'ingrediente' => 'Coacăză, vișnă, cremă, blat', 'alergeni' => null, 'imagine' => 'coacaza_visna.jpg'],
            ['nume' => 'Pepene Galben', 'pret' => 70, 'categorie' => 'inghetata', 'descriere' => 'Desert proaspăt cu pepene galben', 'ingrediente' => 'Pepene galben, cremă, blat', 'alergeni' => null, 'imagine' => 'pepene_galben.jpg'],
            ['nume' => 'Cookies', 'pret' => 60, 'categorie' => 'inghetata', 'descriere' => 'Biscuiți artizanali cu ciocolată', 'ingrediente' => 'Făină, unt, ciocolată, zahăr', 'alergeni' => null, 'imagine' => 'cookies.jpg'],
            ['nume' => 'Buble Gum', 'pret' => 65, 'categorie' => 'inghetata', 'descriere' => 'Desert inspirat din gumă de mestecat', 'ingrediente' => 'Cremă, aromă, colorant alimentar', 'alergeni' => null, 'imagine' => 'bubble_gum.jpg'],
            ['nume' => 'Mango', 'pret' => 75, 'categorie' => 'inghetata', 'descriere' => 'Desert exotic din mango proaspăt', 'ingrediente' => 'Mango, cremă, blat vanilie', 'alergeni' => null, 'imagine' => 'mango_ing.jpg'],
            ['nume' => 'Ananas', 'pret' => 65, 'categorie' => 'inghetata', 'descriere' => 'Desert tropical din ananas', 'ingrediente' => 'Ananas, cremă, blat vanilie', 'alergeni' => null, 'imagine' => 'ananas.jpg'],

            // Sandvișuri & Burgere
            ['nume' => 'Pink Avocado Toast', 'pret' => 75, 'categorie' => 'sandvisuri_burgere', 'descriere' => 'Pâine cu maia, piure avocado, ou poșat, rodie', 'ingrediente' => 'Pâine, avocado, ou, rodie', 'alergeni' => 'gluten, ou', 'imagine' => 'pink_avocado_toast.jpg'],
            ['nume' => 'Blush Burger', 'pret' => 120, 'categorie' => 'sandvisuri_burgere', 'descriere' => 'Vită cu sos roz din sfeclă, brie, rucola', 'ingrediente' => 'Vită, chiflă, sfeclă, brie, rucola', 'alergeni' => 'gluten, lactate', 'imagine' => 'blush_burger.jpg'],
            ['nume' => 'Club Pink Lady', 'pret' => 85, 'categorie' => 'sandvisuri_burgere', 'descriere' => 'Pui, bacon, salată și sos de busuioc', 'ingrediente' => 'Pâine, pui, bacon, salată, busuioc', 'alergeni' => 'gluten', 'imagine' =>'club_pink_lady.jpg'],
            ['nume' => 'Veggie Bagel', 'pret' => 70, 'categorie' => 'sandvisuri_burgere', 'descriere' => 'Bagel cu cremă de brânză și somon', 'ingrediente' => 'Bagel, cremă brânză, somon, mărar', 'alergeni' => 'gluten, lactate, pește', 'imagine' => 'veggie_bagel.jpg'],
            ['nume' => 'Halloumi Wrap', 'pret' => 65, 'categorie' => 'sandvisuri_burgere', 'descriere' => 'Lipie cu brânză halloumi la grătar și legume', 'ingrediente' => 'Lipie, halloumi, ardei, dovlecel', 'alergeni' => 'gluten, lactate', 'imagine' => 'halloumi_wrap.jpg'],
            ['nume' => 'Chicken Melt', 'pret' => 80, 'categorie' => 'sandvisuri_burgere', 'descriere' => 'Sandviș cald cu pui și cheddar', 'ingrediente' => 'Pâine, pui, cheddar, maioneză', 'alergeni' => 'gluten, lactate, ou', 'imagine' => 'chicken_melt.jpg'],
            ['nume' => 'Prosciutto Panini', 'pret' => 75, 'categorie' => 'sandvisuri_burgere', 'descriere' => 'Panini cu prosciutto și mozzarella', 'ingrediente' => 'Pâine, prosciutto, mozzarella, busuioc', 'alergeni' => 'gluten, lactate', 'imagine' => 'prosciutto_panini.jpg'],
        ];

        foreach ($produse as $produs) {
            // Adăugăm timestamps obligatorii pentru Laravel
            $produs['created_at'] = now();
            $produs['updated_at'] = now();

            DB::table('produse')->insert($produs);
        }
    }
}