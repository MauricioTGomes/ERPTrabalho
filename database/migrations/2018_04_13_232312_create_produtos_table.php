<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->default(null);
            $table->integer('qtd_estoque')->default(0);
            $table->decimal('valor_compra', 10, 2)->default(0.00);
            $table->decimal('valor_venda', 10, 2)->default(0.00);
            $table->integer('codigo')->default(null);
            $table->integer('cod_barras')->default(null);
            $table->string('apelido_produto')->default(null);
            $table->char('ativo', 1)->default(0);
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
        Schema::dropIfExists('produtos');
    }
}
