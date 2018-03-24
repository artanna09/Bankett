<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('password');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('adress');
            $table->string('service');
            $table->integer('role_id');
            $table->integer('service_type_id');
            $table->foreign('role_id')->references('id')->on('role');
            $table->foreign('service_type_id')->references('id')->on('service_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}
