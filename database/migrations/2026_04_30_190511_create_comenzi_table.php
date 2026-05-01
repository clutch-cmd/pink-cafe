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
    Schema::create('comenzi', function (Blueprint $table) {
        $table->id();
        $table->string('nume');
        $table->string('telefon');
        $table->string('adresa');
        $table->text('comentarii')->nullable();
        $table->decimal('total', 8, 2);
        $table->enum('status', [
            'noua',
            'in_procesare', 
            'livrata',
            'anulata'
        ])->default('noua');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comenzi');
    }
};
