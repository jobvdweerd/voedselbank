<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('planning', function (Blueprint $table) {
            $table->id();
            $table->date('datum');
            $table->integer('hour');
            $table->boolean('beschikbaar');
            $table->string('functie');
            $table->string('status')->default('pending');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('planning');
    }
};
