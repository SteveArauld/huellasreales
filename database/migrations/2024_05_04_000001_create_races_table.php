<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('description');
            $table->json('imagen')->nullable();
            $table->timestamps();

            $table->index('slug');
        });
    }

    public function down()
    {
        Schema::dropIfExists('races');
    }
};
