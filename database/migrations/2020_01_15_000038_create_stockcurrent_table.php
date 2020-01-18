<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockcurrentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'stockcurrent';

    /**
     * Run the migrations.
     * @table stockcurrent
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('LOCATION');
            $table->string('PRODUCT');
            $table->string('ATTRIBUTESETINSTANCE_ID')->nullable()->default(null);
            $table->double('UNITS');

            $table->index(["ATTRIBUTESETINSTANCE_ID"], 'STOCKCURRENT_ATTSETINST');

            $table->index(["PRODUCT"], 'STOCKCURRENT_FK_1');

            $table->unique(["LOCATION", "PRODUCT", "ATTRIBUTESETINSTANCE_ID"], 'STOCKCURRENT_INX');


//            $table->foreign('ATTRIBUTESETINSTANCE_ID', 'STOCKCURRENT_ATTSETINST')
//                ->references('ID')->on('attributesetinstance')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('PRODUCT', 'STOCKCURRENT_FK_1')
//                ->references('ID')->on('products')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('LOCATION', 'STOCKCURRENT_INX')
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
