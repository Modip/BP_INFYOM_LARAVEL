<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientphysiquesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientphysiques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prenom');
            $table->string('nom');
            $table->string('adresse');
            $table->integer('cni');
            $table->integer('telephone');
            $table->string('email');
            $table->string('login');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clientphysiques');
    }
}
