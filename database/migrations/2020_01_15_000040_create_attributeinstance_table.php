<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeinstanceTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'attributeinstance';

    /**
     * Run the migrations.
     * @table attributeinstance
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('ATTRIBUTESETINSTANCE_ID');
            $table->string('ATTRIBUTE_ID');
            $table->string('VALUE')->nullable()->default(null);

            $table->index(["ATTRIBUTE_ID"], 'ATTINST_ATT');

            $table->index(["ATTRIBUTESETINSTANCE_ID"], 'ATTINST_SET');


//            $table->foreign('ATTRIBUTE_ID', 'ATTINST_ATT')
//                ->references('ID')->on('attribute')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('ATTRIBUTESETINSTANCE_ID', 'ATTINST_SET')
//                ->references('ID')->on('attributesetinstance')
//                ->onDelete('cascade')
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
