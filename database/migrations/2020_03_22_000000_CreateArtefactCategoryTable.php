<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtefactCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artefact_category', function (Blueprint $table) {
            $table->unsignedBigInteger('artefact_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('artefact_id')->references('id')->on('artefacts');
            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artefact_category');
    }
}
