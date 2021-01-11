<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->string('source')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE');
            $table->foreignId('style_card_id')->default('1')->constrained('style_cards')->onDelete('SET DEFAULT');
            $table->foreignId('tag_id')->default('1')->constrained('tags')->onDelete('SET DEFAULT');
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
        Schema::dropIfExists('cards');
    }
}