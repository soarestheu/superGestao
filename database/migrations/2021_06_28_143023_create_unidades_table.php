<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Criando a tabela unidades
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();
        });

        // Criando a coluna unidade_id e atribuindo chave estrangeira a ela na tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->unsignedBiginteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        // Criando a coluna unidade_id e atribuindo chave estrangeira a ela na tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Removendo a coluna unidade_id e a chave estrangeira a atribuida a ela na tabela produto_detalhe
        Schema::table('produto_detalhes', function(Blueprint $table){
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        // Removendo a coluna unidade_id e a chave estrangeira a atribuida a ela na tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->dropForeign('produtos_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
}
