<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'products';

    /**
     * Run the migrations.
     * @table products
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('REFERENCE');
            $table->string('CODE');
            $table->string('CODETYPE')->nullable()->default(null);
            $table->string('NAME');
            $table->double('PRICEBUY')->default('0');
            $table->double('PRICESELL')->default('0');
            $table->string('CATEGORY');
            $table->string('TAXCAT');
            $table->string('ATTRIBUTESET_ID')->nullable()->default(null);
            $table->double('STOCKCOST')->default('0');
            $table->double('STOCKVOLUME')->default('0');
            $table->binary('IMAGE')->nullable()->default(null);
            $table->binary('ATTRIBUTES')->nullable()->default(null);
            $table->string('DISPLAY')->nullable()->default(null);
            $table->smallInteger('ISVPRICE')->default('0');
            $table->smallInteger('ISVERPATRIB')->default('0');
            $table->string('TEXTTIP')->nullable()->default('');
            $table->smallInteger('WARRANTY')->default('0');
            $table->double('STOCKUNITS')->default('0');

            $table->index(["TAXCAT"], 'PRODUCTS_TAXCAT_FK');

            $table->index(["CATEGORY"], 'PRODUCTS_FK_1');

            $table->index(["ATTRIBUTESET_ID"], 'PRODUCTS_ATTRSET_FK');

            $table->unique(["CODE"], 'PRODUCTS_INX_1');

            $table->unique(["REFERENCE"], 'PRODUCTS_INX_0');

            $table->unique(["NAME"], 'PRODUCTS_NAME_INX');


//            $table->foreign('ATTRIBUTESET_ID', 'PRODUCTS_ATTRSET_FK')
//                ->references('ID')->on('attributeset')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('CATEGORY', 'PRODUCTS_FK_1')
//                ->references('ID')->on('categories')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('TAXCAT', 'PRODUCTS_TAXCAT_FK')
//                ->references('ID')->on('taxcategories')
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
