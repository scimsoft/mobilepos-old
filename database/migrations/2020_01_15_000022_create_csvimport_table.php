<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCsvimportTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'csvimport';

    /**
     * Run the migrations.
     * @table csvimport
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('ROWNUMBER')->nullable()->default(null);
            $table->string('CSVERROR')->nullable()->default(null);
            $table->string('REFERENCE')->nullable()->default(null);
            $table->string('CODE')->nullable()->default(null);
            $table->string('NAME')->nullable()->default(null);
            $table->double('PRICEBUY')->nullable()->default(null);
            $table->double('PRICESELL')->nullable()->default(null);
            $table->double('PREVIOUSBUY')->nullable()->default(null);
            $table->double('PREVIOUSSELL')->nullable()->default(null);
            $table->string('CATEGORY')->nullable()->default(null);
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
