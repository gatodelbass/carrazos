<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_departments', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('code');
            $table->string('name')->unique()->index();
            $table->timestamps();
        });
        Schema::create('city_municipalities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_department_id')->constrained();
            $table->integer('code');
            $table->string('name')->index();
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
        Schema::dropIfExists('city_municipalities');
        Schema::dropIfExists('city_departaments');
    }
}
