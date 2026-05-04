<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->string('raza');
            $table->text('descripcion')->nullable();
            $table->json('imagenes')->nullable();
            $table->string('enlace')->nullable();
            $table->timestamps();

            $table->index('slug');
            $table->index('raza');
            $table->index('nombre');
        });
    }

    public function down()
    {
        Schema::dropIfExists('chios');
    }
};
