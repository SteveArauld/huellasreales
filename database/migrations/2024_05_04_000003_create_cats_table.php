<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('slug')->unique();
            $table->string('race');
            $table->integer('age_mois')->nullable();
            $table->string('sexe')->nullable();
            $table->text('description')->nullable();
            $table->json('images')->nullable();
            $table->string('status')->default('disponible');
            $table->timestamps();

            $table->index('slug');
            $table->index('race');
            $table->index('nom');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cats');
    }
};
