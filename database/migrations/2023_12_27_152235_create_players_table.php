<?php

// use App\Models\Player;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up(): void
        {
            Schema::create('players', function (Blueprint $table) {
                $table->id();
                $table->integer('ranking')->default(0);
                $table->string('name');
                $table->string('image')->default('default_image.jpg');
                $table->tinyInteger('age');
                $table->tinyInteger('weight');
                $table->unsignedSmallInteger('height');
                $table->unsignedSmallInteger('points');
                $table->text('country');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
