<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsComTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'products_com';

    /**
     * Run the migrations.
     * @table products_com
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('PRODUCT');
            $table->string('PRODUCT2');

            $table->index(["PRODUCT2"], 'PRODUCTS_COM_FK_2');

            $table->unique(["PRODUCT", "PRODUCT2"], 'PCOM_INX_PROD');


//            $table->foreign('PRODUCT', 'PCOM_INX_PROD')
//                ->references('ID')->on('products')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('PRODUCT2', 'PRODUCTS_COM_FK_2')
//                ->references('ID')->on('products')
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
