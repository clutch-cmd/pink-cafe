<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdusSeeder extends Seeder
{
    public function run()
    {
       DB::statement('SET FOREIGN_KEY_CHECKS=0;');
DB::table('comanda_produse')->truncate();
DB::table('produse')->truncate();
DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $produse = [
            // Băuturi Calde
            ['nume' => 'Ristretto', 'pret' => 25, 'categorie' => 'bauturi_calde', 'descriere' => 'Espresso concentrat și puternic', 'ingrediente' => 'Cafea arabică 100%', 'alergeni' => null],
            ['nume' => 'Espresso', 'pret' => 25, 'categorie' => 'bauturi_calde', 'descriere' => 'Cafea clasică italiană', 'ingrediente' => 'Cafea arabică premium', 'alergeni' => null],
            ['nume' => 'Doppio', 'pret' => 40, 'categorie' => 'bauturi_calde', 'descriere' => 'Espresso dublu pentru energizare maximă', 'ingrediente' => 'Cafea arabică dublă porție', 'alergeni' => null],
            ['nume' => 'Flat White', 'pret' => 50, 'categorie' => 'bauturi_calde', 'descriere' => 'Cafea cremoasă cu lapte microspumat', 'ingrediente' => 'Espresso, lapte integral', 'alergeni' => null],
            ['nume' => 'Americano', 'pret' => 27, 'categorie' => 'bauturi_calde', 'descriere' => 'Espresso alungit cu apă caldă', 'ingrediente' => 'Espresso, apă fierbinte', 'alergeni' => null],
            ['nume' => 'Cappuccino', 'pret' => 35, 'categorie' => 'bauturi_calde', 'descriere' => 'Echilibrul perfect între cafea și spumă', 'ingrediente' => 'Espresso, lapte, spumă de lapte', 'alergeni' => null],
            ['nume' => 'Latte', 'pret' => 40, 'categorie' => 'bauturi_calde', 'descriere' => 'Cafea delicată cu mult lapte', 'ingrediente' => 'Espresso, lapte vaporat', 'alergeni' => null],
            ['nume' => 'Grand Cappuccino', 'pret' => 45, 'categorie' => 'bauturi_calde', 'descriere' => 'Cappuccino în dimensiune XXL', 'ingrediente' => 'Espresso dublu, lapte, spumă', 'alergeni' => null],
            ['nume' => 'RAF', 'pret' => 55, 'categorie' => 'bauturi_calde', 'descriere' => 'Cafea dulce și cremoasă stil rusesc', 'ingrediente' => 'Espresso, cremă, zahăr vanilat', 'alergeni' => null],
            ['nume' => 'Cacao', 'pret' => 35, 'categorie' => 'bauturi_calde', 'descriere' => 'Ciocolată caldă clasică', 'ingrediente' => 'Cacao natural, lapte, zahăr', 'alergeni' => null],
            ['nume' => 'Hot Chocolate', 'pret' => 40, 'categorie' => 'bauturi_calde', 'descriere' => 'Ciocolată premium extra-cremoasă', 'ingrediente' => 'Ciocolată belgiană, lapte, frișcă', 'alergeni' => null],
            ['nume' => 'Tea', 'pret' => 25, 'categorie' => 'bauturi_calde', 'descriere' => 'Selecție de ceaiuri premium', 'ingrediente' => 'Ceai negru/verde/fructe', 'alergeni' => null],
            ['nume' => 'Cappuccino Brulee', 'pret' => 45, 'categorie' => 'bauturi_calde', 'descriere' => 'Cappuccino cu crustă caramelizată', 'ingrediente' => 'Espresso, lapte, zahăr brulat', 'alergeni' => null],
            ['nume' => 'Bounty Coffee', 'pret' => 50, 'categorie' => 'bauturi_calde', 'descriere' => 'Cafea cu aromă de cocos și ciocolată', 'ingrediente' => 'Espresso, sirop cocos, lapte, ciocolată', 'alergeni' => null],
            ['nume' => 'Matcha', 'pret' => 50, 'categorie' => 'bauturi_calde', 'descriere' => 'Ceai verde japonez ceremonial', 'ingrediente' => 'Matcha premium, lapte', 'alergeni' => null],

            // Cocktailuri
            ['nume' => 'Aperol Spritz', 'pret' => 80, 'categorie' => 'cocktailuri', 'descriere' => 'Cocktail italian răcoritor', 'ingrediente' => 'Aperol, prosecco, sifon, portocală', 'alergeni' => 'alcool'],
            ['nume' => 'Strawberry Aperol', 'pret' => 85, 'categorie' => 'cocktailuri', 'descriere' => 'Aperol Spritz cu căpșuni proaspete', 'ingrediente' => 'Aperol, prosecco, căpșuni, sifon', 'alergeni' => 'alcool'],
            ['nume' => 'Sex on the Beach', 'pret' => 80, 'categorie' => 'cocktailuri', 'descriere' => 'Cocktail tropical dulce-acrișor', 'ingrediente' => 'Vodcă, peach schnapps, suc portocale, cranberry', 'alergeni' => 'alcool'],
            ['nume' => 'Pina Colada', 'pret' => 90, 'categorie' => 'cocktailuri', 'descriere' => 'Cocktail exotic cu ananas și cocos', 'ingrediente' => 'Rom alb, cremă cocos, suc ananas', 'alergeni' => 'alcool, nuci'],
            ['nume' => 'Pornstar Martini', 'pret' => 90, 'categorie' => 'cocktailuri', 'descriere' => 'Cocktail elegant cu fructul pasiunii', 'ingrediente' => 'Vodcă, lichior passion fruit, vanilie, prosecco', 'alergeni' => 'alcool'],
            ['nume' => 'Mojito', 'pret' => 80, 'categorie' => 'cocktailuri', 'descriere' => 'Cocktail cubanez cu mentă', 'ingrediente' => 'Rom alb, mentă, lime, zahăr, sifon', 'alergeni' => 'alcool'],

            // Lemonades
            ['nume' => 'Lemonade Passion Fruit', 'pret' => 50, 'categorie' => 'lemonades', 'descriere' => 'Lemonadă cu fructul pasiunii', 'ingrediente' => 'Fruct pasiunii, lămâie, zahăr, apă', 'alergeni' => null],
            ['nume' => 'Lemonade Banana', 'pret' => 50, 'categorie' => 'lemonades', 'descriere' => 'Lemonadă exotică cu banane', 'ingrediente' => 'Banane, lămâie, zahăr, apă', 'alergeni' => null],
            ['nume' => 'Lemonade Strawberry', 'pret' => 50, 'categorie' => 'lemonades', 'descriere' => 'Lemonadă dulce cu căpșuni', 'ingrediente' => 'Căpșuni proaspete, lămâie, zahăr, apă', 'alergeni' => null],
            ['nume' => 'Lemonade Kiwi', 'pret' => 50, 'categorie' => 'lemonades', 'descriere' => 'Lemonadă acră cu kiwi', 'ingrediente' => 'Kiwi, lămâie, zahăr, apă', 'alergeni' => null],
            ['nume' => 'Lemonade Mango', 'pret' => 50, 'categorie' => 'lemonades', 'descriere' => 'Lemonadă tropicală cu mango', 'ingrediente' => 'Mango, lămâie, zahăr, apă', 'alergeni' => null],
            ['nume' => 'Fresh Portocala', 'pret' => 65, 'categorie' => 'lemonades', 'descriere' => 'Suc proaspăt de portocale', 'ingrediente' => 'Portocale 100% naturale', 'alergeni' => null],
            ['nume' => 'Fresh Grapefruit', 'pret' => 65, 'categorie' => 'lemonades', 'descriere' => 'Suc proaspăt de grapefruit', 'ingrediente' => 'Grapefruit roz 100% natural', 'alergeni' => null],

            // Deserturi
            ['nume' => 'Eskimo Fistic & Zmeura', 'pret' => 70, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură înghețată cu fistic și zmeură', 'ingrediente' => 'Cremă fistic, zmeură, blat vanilie', 'alergeni' => 'ouă, lapte și produse lactate, nuci-fistic'],
            ['nume' => 'Inima', 'pret' => 60, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură romantică în formă de inimă', 'ingrediente' => 'Cremă mascarpone, căpșuni, blat roșu', 'alergeni' => 'ouă, lapte și produse lactate'],
            ['nume' => 'Dimineata de Vara', 'pret' => 65, 'categorie' => 'deserturi', 'descriere' => 'Desert fresh cu fructe de vară', 'ingrediente' => 'Cremă iaurt, fructe sezon, blat vanilie', 'alergeni' => 'ouă, lapte și produse lactate'],
            ['nume' => 'Cub de Ciocolata', 'pret' => 70, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură intensă de ciocolată', 'ingrediente' => 'Ciocolată neagră, mousse cacao, blat brownie', 'alergeni' => 'ouă, lapte și produse lactate, gluten'],
            ['nume' => 'Three Chocolates', 'pret' => 70, 'categorie' => 'deserturi', 'descriere' => 'Trei straturi de ciocolată premium', 'ingrediente' => 'Ciocolată albă, lapte, neagră, blat cacao', 'alergeni' => 'ouă, lapte și produse lactate, gluten'],
            ['nume' => 'Mochi Mango Zmeura & Fructul Pasiunii', 'pret' => 55, 'categorie' => 'deserturi', 'descriere' => 'Mochi japonez cu umplutură tropicală', 'ingrediente' => 'Orez mochi, cremă mango, zmeură, passion fruit', 'alergeni' => 'lapte și produse lactate, gluten'],
            ['nume' => 'Mochi Capsuna', 'pret' => 55, 'categorie' => 'deserturi', 'descriere' => 'Mochi dulce cu căpșuni', 'ingrediente' => 'Orez mochi, cremă căpșuni proaspete', 'alergeni' => 'lapte și produse lactate'],
            ['nume' => 'Mochi Snickers', 'pret' => 55, 'categorie' => 'deserturi', 'descriere' => 'Mochi inspirat din Snickers', 'ingrediente' => 'Orez mochi, caramel, arahide, ciocolată', 'alergeni' => 'lapte și produse lactate, gluten, arahide'],
            ['nume' => 'Mochi Bounty', 'pret' => 55, 'categorie' => 'deserturi', 'descriere' => 'Mochi cu cocos și ciocolată', 'ingrediente' => 'Orez mochi, cremă cocos, ciocolată neagră', 'alergeni' => 'lapte și produse lactate, nuci, gluten'],
            ['nume' => 'Mochi Lamaie', 'pret' => 55, 'categorie' => 'deserturi', 'descriere' => 'Mochi proaspăt cu lămâie', 'ingrediente' => 'Orez mochi, cremă lămâie, zeste citrice', 'alergeni' => 'lapte și produse lactate, gluten'],
            ['nume' => 'Tiramisu', 'pret' => 70, 'categorie' => 'deserturi', 'descriere' => 'Desert clasic italian', 'ingrediente' => 'Mascarpone, cafea espresso, savoiardi, cacao', 'alergeni' => 'ouă, lapte și produse lactate, gluten'],
            ['nume' => 'Fructe de Padure', 'pret' => 70, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură cu fructe de pădure', 'ingrediente' => 'Afine, mure, zmeură, cremă, blat', 'alergeni' => 'lapte și produse lactate, nuci, gluten'],
            ['nume' => 'Prajitura Cupola', 'pret' => 65, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură elegantă în formă de cupolă', 'ingrediente' => 'Mousse vanilie, glazură oglindă, blat', 'alergeni' => 'ouă, lapte și produse lactate, gluten'],
            ['nume' => 'Malibu', 'pret' => 70, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură cu aromă de cocos și rom', 'ingrediente' => 'Cremă Malibu, cocos, blat umed', 'alergeni' => 'lapte și produse lactate, nuci, gluten, alcool'],
            ['nume' => 'Tartaleta Dubai', 'pret' => 75, 'categorie' => 'deserturi', 'descriere' => 'Tartă luxoasă cu ciocolată și fistic', 'ingrediente' => 'Ciocolată premium, cremă fistic, aur comestibil', 'alergeni' => 'ouă, lapte și produse lactate, gluten, nuci'],
            ['nume' => 'Lamaie', 'pret' => 65, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură proaspătă de lămâie', 'ingrediente' => 'Lemon curd, cremă, blat vanilie', 'alergeni' => 'ouă, lapte și produse lactate, gluten'],
            ['nume' => 'Para', 'pret' => 65, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură delicată cu pere', 'ingrediente' => 'Pere caramelizate, cremă vanilie, blat', 'alergeni' => 'ouă, lapte și produse lactate, gluten'],
            ['nume' => 'Mar', 'pret' => 65, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură cu mere și scorțișoară', 'ingrediente' => 'Mere, scorțișoară, nuci, cremă', 'alergeni' => 'ouă, lapte și produse lactate, nuci, gluten'],
            ['nume' => 'Cocos', 'pret' => 80, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură tropicală cu cocos', 'ingrediente' => 'Cocos proaspăt, cremă, ciocolată albă', 'alergeni' => 'lapte și produse lactate, nuci, gluten'],
            ['nume' => 'Mango & Fructul Pasiunii', 'pret' => 75, 'categorie' => 'deserturi', 'descriere' => 'Desert exotic cu mango și passion fruit', 'ingrediente' => 'Mango, fruct pasiunii, mousse, blat', 'alergeni' => 'ouă, lapte și produse lactate, gluten'],
            ['nume' => 'Mango & Ananas', 'pret' => 65, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură tropicală cu două fructe', 'ingrediente' => 'Mango, ananas, cremă, blat', 'alergeni' => 'ouă, lapte și produse lactate, gluten'],
            ['nume' => 'Zmeura', 'pret' => 70, 'categorie' => 'deserturi', 'descriere' => 'Prăjitură proaspătă cu zmeură', 'ingrediente' => 'Zmeură proaspătă, mousse, blat vanilie', 'alergeni' => 'ouă, lapte și produse lactate'],
        ];

        foreach ($produse as $produs) {
            DB::table('produse')->insert($produs);
        }
    }
}