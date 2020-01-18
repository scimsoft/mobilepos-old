<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineremovedTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'lineremoved';

    /**
     * Run the migrations.
     * @table lineremoved
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamp('REMOVEDDATE')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('NAME')->nullable()->default(null);
            $table->string('TICKETID')->nullable()->default(null);
            $table->string('PRODUCTID')->nullable()->default(null);
            $table->string('PRODUCTNAME')->nullable()->default(null);
            $table->double('UNITS');
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
