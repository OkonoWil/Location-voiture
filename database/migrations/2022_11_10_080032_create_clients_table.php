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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastName');
            $table->date('dateDeNaissance');
            $table->string('lieuDeNaissance');
            $table->string('nationalite');
            $table->string('ville');
            $table->string('pays');
            $table->string('Adresse');
            $table->string('sexe');
            $table->string('email')->unique();
            $table->bigInteger('phone1')->unique();
            $table->string('pieceIdentite');
            $table->bigInteger('numeroPieceIdentite')->unique();
            $table->bigInteger('phone2')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('user_id')
                ->constrained('users')
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
        Schema::dropIfExists('clients');
    }
};
