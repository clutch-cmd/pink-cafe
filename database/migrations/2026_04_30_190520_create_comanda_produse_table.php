<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('comanda_produse', function (Blueprint $table) {
        $table->id();
        $table->foreignId('comanda_id')->constrained('comenzi')->onDelete('cascade');
        $table->foreignId('produs_id')->constrained('produse')->onDelete('cascade');
        $table->integer('cantitate');
        $table->decimal('pret', 8, 2);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comanda_produse');
    }
};
