<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('modele');
            $table->string('immatriculation')->unique();
            $table->string('numeroSerie')->unique();
            $table->string('couleur');
            $table->date('dateDeFabri');
            $table->unsignedInteger('nombrePlace');
            $table->double('tarifParJour');
            $table->boolean('disponible')->default(true);
            $table->boolean('visible')->default(true);
            $table->foreignId('marque_id')
                ->constrained('marques')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voitures');
    }
};
