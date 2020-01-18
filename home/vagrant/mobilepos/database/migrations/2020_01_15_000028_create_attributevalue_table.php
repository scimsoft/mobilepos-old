<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributevalueTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'attributevalue';

    /**
     * Run the migrations.
     * @table attributevalue
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('ATTRIBUTE_ID');
            $table->string('VALUE')->nullable()->default(null);

            $table->index(["ATTRIBUTE_ID"], 'ATTVAL_ATT');


//            $table->foreign('ATTRIBUTE_ID', 'ATTVAL_ATT')
//                ->references('ID')->on('attribute')
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
