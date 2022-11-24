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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->double('montant');
            $table->double('caution');
            $table->boolean('visible')->default(true);
            $table->foreignId('client_id')
                ->constrained('clients')
                ->onUpdate('cascade');
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade');
            $table->foreignId('voiture_id')
                ->constrained('voitures')
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
        Schema::dropIfExists('louers');
    }
};
