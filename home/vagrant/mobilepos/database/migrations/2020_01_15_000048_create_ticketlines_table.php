<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketlinesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ticketlines';

    /**
     * Run the migrations.
     * @table ticketlines
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('TICKET');
            $table->integer('LINE');
            $table->string('PRODUCT')->nullable()->default(null);
            $table->string('ATTRIBUTESETINSTANCE_ID')->nullable()->default(null);
            $table->double('UNITS');
            $table->double('PRICE');
            $table->string('TAXID');
            $table->binary('ATTRIBUTES')->nullable()->default(null);

            $table->index(["ATTRIBUTESETINSTANCE_ID"], 'TICKETLINES_ATTSETINST');

            $table->index(["PRODUCT"], 'TICKETLINES_FK_2');

            $table->index(["TAXID"], 'TICKETLINES_FK_3');


//            $table->foreign('ATTRIBUTESETINSTANCE_ID', 'TICKETLINES_ATTSETINST')
//                ->references('ID')->on('attributesetinstance')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('PRODUCT', 'TICKETLINES_FK_2')
//                ->references('ID')->on('products')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('TAXID', 'TICKETLINES_FK_3')
//                ->references('ID')->on('taxes')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('TICKET', 'ticketlines_TICKET')
//                ->references('ID')->on('tickets')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
