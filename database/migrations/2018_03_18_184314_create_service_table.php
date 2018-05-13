<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('extra_service', 1000);
            $table->string('district', 50);
            $table->string('adress', 100);
            $table->decimal('price', 5, 2);
            $table->string('email', 256);
            $table->string('phone', 20);
            $table->integer('person_number_from');
            $table->integer('person_number_to');
            $table->string('description', 5000);
            $table->string('photo', 300);
            $table->integer('service_type_id');
            $table->foreign('service_type_id')->references('id')->on('service_type');
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
        Schema::dropIfExists('service');
    }
}
