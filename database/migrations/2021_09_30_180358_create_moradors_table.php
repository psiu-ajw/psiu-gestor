<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moradors', function (Blueprint $table) {
            $table->id();
            $table->string('cpf');
            $table->date('data_nascimento');
            $table->string('sexo');
            $table->string('estado_civil');
            $table->string('cor_da_pele');
            $table->unsignedBigInteger('comunidade')->nullable(true);
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
        Schema::dropIfExists('moradors');
    }
}
