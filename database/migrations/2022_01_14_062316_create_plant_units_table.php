<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('load_category_id')->references('id')->on('load_categories');
            $table->foreignId('unit_id')->references('id')->on('units');
            $table->double('dump_distance')->nullable();
            $table->double('capacity')->nullable();
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
        Schema::dropIfExists('plant_units');
    }
}
