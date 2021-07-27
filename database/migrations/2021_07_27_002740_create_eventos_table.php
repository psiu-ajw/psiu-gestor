<?php

use App\Models\Evento;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();

            $table->string('nome_evento')->nullable(true);
            $table->string('area_evento')->nullable(true);
            $table->integer('pontuacao')->nullable(true);
            $table->unsignedBigInteger('tipo_evento_id')->nullable(true);
            $table->enum('financiador', Evento::FINANCIADOR_ENUM);
            $table->foreign('tipo_evento_id')->references('id')->on('tipos_eventos');

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
        Schema::dropIfExists('eventos');
    }
}
