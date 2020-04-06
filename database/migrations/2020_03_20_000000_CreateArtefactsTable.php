<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtefactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artefacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('author');
            $table->string('made_in');
            $table->string('publisher');
            $table->integer('year');
            $table->integer('pages');
            //$table->integer('likes');

            $table->integer('main_category_id')->unsigned();
            $table->foreign('main_category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artefacts');
    }
}
