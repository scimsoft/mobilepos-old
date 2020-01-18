<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'places';

    /**
     * Run the migrations.
     * @table places
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('NAME');
            $table->integer('X');
            $table->integer('Y');
            $table->string('FLOOR');
            $table->string('CUSTOMER')->nullable()->default(null);
            $table->string('WAITER')->nullable()->default(null);
            $table->string('TICKETID')->nullable()->default(null);
            $table->smallInteger('TABLEMOVED')->default('0');

            $table->index(["FLOOR"], 'PLACES_FK_1');

            $table->unique(["NAME"], 'PLACES_NAME_INX');

//
//            $table->foreign('FLOOR', 'PLACES_FK_1')
//                ->references('ID')->on('floors')
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
