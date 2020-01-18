<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'taxes';

    /**
     * Run the migrations.
     * @table taxes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('NAME');
            $table->string('CATEGORY');
            $table->string('CUSTCATEGORY')->nullable()->default(null);
            $table->string('PARENTID')->nullable()->default(null);
            $table->double('RATE')->default('0');
            $table->integer('RATEORDER')->nullable()->default(null);

            $table->index(["CATEGORY"], 'TAXES_CAT_FK');

            $table->index(["CUSTCATEGORY"], 'TAXES_CUSTCAT_FK');

            $table->index(["PARENTID"], 'PARENTID');

            $table->unique(["NAME"], 'TAXES_NAME_INX');


//            $table->foreign('CATEGORY', 'TAXES_CAT_FK')
//                ->references('ID')->on('taxcategories')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('CUSTCATEGORY', 'TAXES_CUSTCAT_FK')
//                ->references('ID')->on('taxcustcategories')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('PARENTID', 'PARENTID')
//                ->references('ID')->on('taxes')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('PARENTID', 'PARENTID')
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
