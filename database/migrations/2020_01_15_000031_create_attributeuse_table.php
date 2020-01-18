<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeuseTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'attributeuse';

    /**
     * Run the migrations.
     * @table attributeuse
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('ATTRIBUTESET_ID');
            $table->string('ATTRIBUTE_ID');
            $table->integer('LINENO')->nullable()->default(null);

            $table->index(["ATTRIBUTE_ID"], 'ATTUSE_ATT');

            $table->unique(["ATTRIBUTESET_ID", "LINENO"], 'ATTUSE_LINE');


//            $table->foreign('ATTRIBUTE_ID', 'ATTUSE_ATT')
//                ->references('ID')->on('attribute')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('ATTRIBUTESET_ID', 'ATTUSE_LINE')
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
