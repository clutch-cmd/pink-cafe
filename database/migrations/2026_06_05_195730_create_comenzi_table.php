<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    // Verifică dacă tabelul există deja. Dacă NU există, îl creează. Dacă există, trece peste fără eroare!
    if (!Schema::hasTable('comenzi')) {
        Schema::create('comenzi', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('id_produs'); 
            $table->string('optiune_lapte')->nullable();
            $table->text('toppings')->nullable();
            $table->date('data_rezervare');
            $table->time('ora_rezervare');
            $table->text('mentiuni_speciale')->nullable();
            $table->decimal('pret_total', 8, 2);
            $table->timestamps();

            $table->foreign('id_produs')->references('id')->on('produse')->onDelete('cascade');
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comenzi');
    }
};
