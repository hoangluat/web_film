<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('director')->nullable();
            $table->string('actor')->nullable();
            $table->string('duration')->nullable();
            $table->integer('filmview')->nullable();
            $table->integer('year')->nullable();
            $table->text('description')->nullable();
            $table->string('trailer')->nullable();
            $table->string('image');
            $table->string('imagebanner');
            $table->string('ttstatus')->nullable();
            $table->integer('session')->nullable();
            $table->string('slug');
            $table->integer('kindoffilm_id');
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
        Schema::dropIfExists('films');
    }
}
