<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlantTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('klant', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->boolean('volwassen');
            $table->integer('kinderen');
            $table->integer('baby\'s');
            $table->string('postcode');
            $table->text('wensen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klant');
    }
}
