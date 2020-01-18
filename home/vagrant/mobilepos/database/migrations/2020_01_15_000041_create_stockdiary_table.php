<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockdiaryTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'stockdiary';

    /**
     * Run the migrations.
     * @table stockdiary
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->dateTime('DATENEW');
            $table->integer('REASON');
            $table->string('LOCATION');
            $table->string('PRODUCT');
            $table->string('ATTRIBUTESETINSTANCE_ID')->nullable()->default(null);
            $table->double('UNITS');
            $table->double('PRICE');
            $table->string('APPUSER')->nullable()->default(null);

            $table->index(["PRODUCT"], 'STOCKDIARY_FK_1');

            $table->index(["DATENEW"], 'STOCKDIARY_INX_1');

            $table->index(["LOCATION"], 'STOCKDIARY_FK_2');

            $table->index(["ATTRIBUTESETINSTANCE_ID"], 'STOCKDIARY_ATTSETINST');


//            $table->foreign('ATTRIBUTESETINSTANCE_ID', 'STOCKDIARY_ATTSETINST')
//                ->references('ID')->on('attributesetinstance')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('PRODUCT', 'STOCKDIARY_FK_1')
//                ->references('ID')->on('products')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('LOCATION', 'STOCKDIARY_FK_2')
//                ->references('ID')->on('locations')
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
