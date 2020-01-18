<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftBreaksTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'shift_breaks';

    /**
     * Run the migrations.
     * @table shift_breaks
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('SHIFTID');
            $table->string('BREAKID');
//            $table->timestamp('STARTTIME');
//            $table->timestamp('ENDTIME');

            $table->index(["BREAKID"], 'SHIFT_BREAKS_BREAKID');

            $table->index(["SHIFTID"], 'SHIFT_BREAKS_SHIFTID');


//            $table->foreign('BREAKID', 'SHIFT_BREAKS_BREAKID')
//                ->references('ID')->on('breaks')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('SHIFTID', 'SHIFT_BREAKS_SHIFTID')
//                ->references('ID')->on('shifts')
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
