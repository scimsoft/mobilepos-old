<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'leaves';

    /**
     * Run the migrations.
     * @table leaves
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('PPLID');
            $table->string('NAME');
            $table->dateTime('STARTDATE');
            $table->dateTime('ENDDATE');
            $table->string('NOTES')->nullable()->default(null);

            $table->index(["PPLID"], 'lEAVES_PPLID');

//
//            $table->foreign('PPLID', 'lEAVES_PPLID')
//                ->references('ID')->on('people')
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
