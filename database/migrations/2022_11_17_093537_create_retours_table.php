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
        Schema::create('retours', function (Blueprint $table) {
            $table->id();
            $table->date('dateRetour');
            $table->boolean('visible')->default(true);
            $table->foreignId('client_id')
                ->constrained('clients')
                ->onUpdate('cascade');
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade');
            $table->foreignId('etat_id')
                ->constrained('etats')
                ->onUpdate('cascade');
            $table->foreignId('location_id')
                ->constrained('locations')
                ->onDelete('cascade');
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
        Schema::dropIfExists('retours');
    }
};
