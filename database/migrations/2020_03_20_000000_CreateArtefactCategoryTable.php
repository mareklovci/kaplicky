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
            $table->integer('artefact_id')->unsigned();;
            $table->integer('catagory_id')->unsigned();;
            $table->foreign('artefact_id')->references('id')->on('artefacts');
            $table->foreign('catagory_id')->references('id')->on('catagories');
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
