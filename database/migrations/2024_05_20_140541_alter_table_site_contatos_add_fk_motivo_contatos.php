<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            //adicionando coluna motivo_contatos_id
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //atribuindo motivo_contato para motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //criando fk e removendo motivo_contato
        Schema::table('site_contatos', function (Blueprint $table){
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //criando motivo_contato e removendo fk
        Schema::table('site_contatos', function (Blueprint $table){
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        //atribuir motivo_contatos_id para motivo_contato
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        //removendo motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table){
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
