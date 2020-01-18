<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'receipts';

    /**
     * Run the migrations.
     * @table receipts
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('MONEY');
            $table->dateTime('DATENEW');
            $table->binary('ATTRIBUTES')->nullable()->default(null);
            $table->string('PERSON')->nullable()->default(null);

            $table->index(["DATENEW"], 'RECEIPTS_INX_1');

            $table->index(["MONEY"], 'RECEIPTS_FK_MONEY');


//            $table->foreign('MONEY', 'RECEIPTS_FK_MONEY')
//                ->references('MONEY')->on('closedcash')
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
