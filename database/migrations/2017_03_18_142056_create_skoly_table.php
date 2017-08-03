<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkolyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skoly', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('red_izo');
            $table->integer('ico');
            $table->integer('zrizovatel');
            $table->string('uzemi');
            $table->integer('orp');
            $table->string('plny_nazev');
            $table->string('zkraceny_nazev');
            $table->string('reditel');
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
        Schema::dropIfExists('skoly');
    }
}
