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
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('title', 100);
            $table->string('extra_service', 1000)->nullable();
            $table->string('district', 50);
            $table->string('adress', 100)->nullable();
            $table->decimal('price', 5, 2);
            $table->string('email', 256);
            $table->string('phone', 20);
            $table->integer('person_number_from')->nullable();
            $table->integer('person_number_to')->nullable();
            $table->string('description', 5000);
            $table->string('photo', 300);
            $table->integer('service_type_id')->unsigned();
            $table->foreign('service_type_id')->references('id')->on('service_type')->onDelete('cascade');
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
