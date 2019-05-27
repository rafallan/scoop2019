<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo', 50);
            $table->string('titulo');
            $table->string('autor');
            $table->string('email');
            $table->string('telefone', 50);
            $table->string('lattes');
            $table->unsignedBigInteger('area_id');
            $table->string('instituicao');
            $table->string('turnos');
            $table->string('dias');
            $table->text('resumo');
            $table->text('materiais');
            $table->foreign('area_id')->references('id')->on('areas_tematicas')->onDelete('cascade');
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
        Schema::dropIfExists('submissoes');
    }
}
