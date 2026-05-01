<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $produse = [
        // Băuturi Calde
        ['nume' => 'Ristretto', 'pret' => 25, 'categorie' => 'bauturi_calde'],
        ['nume' => 'Espresso', 'pret' => 25, 'categorie' => 'bauturi_calde'],
        ['nume' => 'Doppio', 'pret' => 40, 'categorie' => 'bauturi_calde'],
        ['nume' => 'Flat White', 'pret' => 50, 'categorie' => 'bauturi_calde'],
        ['nume' => 'Americano', 'pret' => 27, 'categorie' => 'bauturi_calde'],
        ['nume' => 'Cappuccino', 'pret' => 35, 'categorie' => 'bauturi_calde'],
        ['nume' => 'Latte', 'pret' => 40, 'categorie' => 'bauturi_calde'],
        ['nume' => 'Grand Cappuccino', 'pret' => 45, 'categorie' => 'bauturi_calde'],
        ['nume' => 'RAF', 'pret' => 55, 'categorie' => 'bauturi_calde'],
        ['nume' => 'Cacao', 'pret' => 35, 'categorie' => 'bauturi_calde'],
        ['nume' => 'Hot Chocolate', 'pret' => 40, 'categorie' => 'bauturi_calde'],
        ['nume' => 'Tea', 'pret' => 25, 'categorie' => 'bauturi_calde'],
        ['nume' => 'Cappuccino Brulee', 'pret' => 45, 'categorie' => 'bauturi_calde'],
        ['nume' => 'Bounty Coffee', 'pret' => 50, 'categorie' => 'bauturi_calde'],
        ['nume' => 'Matcha', 'pret' => 50, 'categorie' => 'bauturi_calde'],

        // Cocktailuri
        ['nume' => 'Aperol Spritz', 'pret' => 80, 'categorie' => 'cocktailuri'],
        ['nume' => 'Strawberry Aperol', 'pret' => 85, 'categorie' => 'cocktailuri'],
        ['nume' => 'Sex on the Beach', 'pret' => 80, 'categorie' => 'cocktailuri'],
        ['nume' => 'Pina Colada', 'pret' => 90, 'categorie' => 'cocktailuri'],
        ['nume' => 'Pornstar Martini', 'pret' => 90, 'categorie' => 'cocktailuri'],
        ['nume' => 'Mojito', 'pret' => 80, 'categorie' => 'cocktailuri'],

        // Lemonades
        ['nume' => 'Lemonade Passion Fruit', 'pret' => 50, 'categorie' => 'lemonades'],
        ['nume' => 'Lemonade Banana', 'pret' => 50, 'categorie' => 'lemonades'],
        ['nume' => 'Lemonade Strawberry', 'pret' => 50, 'categorie' => 'lemonades'],
        ['nume' => 'Lemonade Kiwi', 'pret' => 50, 'categorie' => 'lemonades'],
        ['nume' => 'Lemonade Mango', 'pret' => 50, 'categorie' => 'lemonades'],
        ['nume' => 'Fresh Portocala', 'pret' => 65, 'categorie' => 'lemonades'],
        ['nume' => 'Fresh Grapefruit', 'pret' => 65, 'categorie' => 'lemonades'],

        // Deserturi
        ['nume' => 'Eskimo Fistic & Zmeura', 'pret' => 70, 'categorie' => 'deserturi'],
        ['nume' => 'Inima', 'pret' => 60, 'categorie' => 'deserturi'],
        ['nume' => 'Dimineata de Vara', 'pret' => 65, 'categorie' => 'deserturi'],
        ['nume' => 'Cub de Ciocolata', 'pret' => 70, 'categorie' => 'deserturi'],
        ['nume' => 'Three Chocolates', 'pret' => 70, 'categorie' => 'deserturi'],
        ['nume' => 'Mochi Mango Zmeura & Fructul Pasiunii', 'pret' => 55, 'categorie' => 'deserturi'],
        ['nume' => 'Mochi Capsuna', 'pret' => 55, 'categorie' => 'deserturi'],
        ['nume' => 'Mochi Snickers', 'pret' => 55, 'categorie' => 'deserturi'],
        ['nume' => 'Mochi Bounty', 'pret' => 55, 'categorie' => 'deserturi'],
        ['nume' => 'Mochi Lamaie', 'pret' => 55, 'categorie' => 'deserturi'],
        ['nume' => 'Tiramisu', 'pret' => 70, 'categorie' => 'deserturi'],
        ['nume' => 'Fructe de Padure', 'pret' => 70, 'categorie' => 'deserturi'],
        ['nume' => 'Prajitura Cupola', 'pret' => 65, 'categorie' => 'deserturi'],
        ['nume' => 'Malibu', 'pret' => 70, 'categorie' => 'deserturi'],
        ['nume' => 'Tartaleta Dubai', 'pret' => 75, 'categorie' => 'deserturi'],
        ['nume' => 'Lamaie', 'pret' => 65, 'categorie' => 'deserturi'],
        ['nume' => 'Para', 'pret' => 65, 'categorie' => 'deserturi'],
        ['nume' => 'Mar', 'pret' => 65, 'categorie' => 'deserturi'],
        ['nume' => 'Cocos', 'pret' => 80, 'categorie' => 'deserturi'],
        ['nume' => 'Mango & Fructul Pasiunii', 'pret' => 75, 'categorie' => 'deserturi'],
        ['nume' => 'Mango & Ananas', 'pret' => 65, 'categorie' => 'deserturi'],
        ['nume' => 'Zmeura', 'pret' => 70, 'categorie' => 'deserturi'],
    ];

    foreach ($produse as $produs) {
        DB::table('produse')->insert($produs);
    }

}

}
