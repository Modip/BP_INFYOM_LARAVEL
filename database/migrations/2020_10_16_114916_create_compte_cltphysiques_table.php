<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompteCltphysiquesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte_cltphysiques', function (Blueprint $table) {
            $table->increments('id');
           // $table->integer('clientphysique_id');
            $table->foreign('clientphysique_id')->references('id')->on('clientphysique');
            $table->integer('numerocompte');
            $table->integer('solde');
            $table->integer('clerib');
            $table->integer('frais');
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
        Schema::drop('compte_cltphysiques');
    }
}
