<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'reservations';

    /**
     * Run the migrations.
     * @table reservations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->dateTime('CREATED');
            $table->dateTime('DATENEW')->default('2013-01-01 00:00:00');
            $table->string('TITLE');
            $table->integer('CHAIRS');
            $table->string('DESCRIPTION')->nullable()->default(null);

            $table->index(["DATENEW"], 'RESERVATIONS_INX_1');
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
