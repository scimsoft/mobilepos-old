<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesetinstanceTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'attributesetinstance';

    /**
     * Run the migrations.
     * @table attributesetinstance
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('ATTRIBUTESET_ID');
            $table->string('DESCRIPTION')->nullable()->default(null);

            $table->index(["ATTRIBUTESET_ID"], 'ATTSETINST_SET');


//            $table->foreign('ATTRIBUTESET_ID', 'ATTSETINST_SET')
//                ->references('ID')->on('attributeset')
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
