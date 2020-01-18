<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClosedcashTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'closedcash';

    /**
     * Run the migrations.
     * @table closedcash
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('MONEY');
            $table->string('HOST');
            $table->integer('HOSTSEQUENCE');
            $table->dateTime('DATESTART');
            $table->dateTime('DATEEND')->nullable()->default(null);
            $table->integer('NOSALES')->default('0');

            $table->index(["DATESTART"], 'CLOSEDCASH_INX_1');

            $table->unique(["HOST", "HOSTSEQUENCE"], 'CLOSEDCASH_INX_SEQ');
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
