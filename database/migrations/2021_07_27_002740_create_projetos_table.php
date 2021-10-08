<?php


use App\Models\Projeto;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();

            $table->string('nome_projeto')->nullable(true);
            $table->string('area_projeto')->nullable(true);
            $table->unsignedBigInteger('community_id')->nullable(true);
            $table->integer('pontuacao')->nullable(true);
            $table->enum('financiador', Projeto::FINANCIADOR_ENUM);
            $table->enum('status', Projeto::STATUS_ENUM)->nullable(true);
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
        Schema::dropIfExists('projetos');
    }
}
