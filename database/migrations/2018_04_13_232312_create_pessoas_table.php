<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->default(null);
            $table->string('razao_social')->default(null);
            $table->string('fantasia')->default(null);
            $table->string('cpf', 25)->default(null);
            $table->string('rg', 25)->default(null);
            $table->string('cnpj')->default(null);
            $table->string('ie')->default(null);
            $table->string('fone', 25)->default(null);
            $table->string('email')->default(null);
            $table->string('endereco')->default(null);
            $table->string('cep')->default(null);
            $table->integer('endereco_nro');
            $table->string('bairro')->default(null);
            $table->string('complemento')->default(null);
            $table->string('sexo', 25)->default(null);
            $table->char('cliente', 1)->default(0);
            $table->char('fornecedor', 1)->default(0);
            $table->integer('cidade_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('pessoas', function ($table) {
            $table->foreign('cidade_id')->references('id')->on('Ecommerce.cidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
