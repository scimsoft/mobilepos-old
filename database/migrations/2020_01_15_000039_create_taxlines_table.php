<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxlinesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'taxlines';

    /**
     * Run the migrations.
     * @table taxlines
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('RECEIPT');
            $table->string('TAXID');
            $table->double('BASE')->default('0');
            $table->double('AMOUNT')->default('0');

            $table->index(["RECEIPT"], 'TAXLINES_RECEIPT');

            $table->index(["TAXID"], 'TAXLINES_TAX');


//            $table->foreign('RECEIPT', 'TAXLINES_RECEIPT')
//                ->references('ID')->on('receipts')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('TAXID', 'TAXLINES_TAX')
//                ->references('ID')->on('taxes')
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
