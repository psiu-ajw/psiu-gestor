<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_projetos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_projeto')->nullable(true);
            $table->unsignedBigInteger('id_item')->nullable(true);
            $table->foreign('id_projeto')->references('id')->on('projetos');
            $table->foreign('id_item')->references('id')->on('itens');
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
        Schema::dropIfExists('itens_projetos');
    }
}
