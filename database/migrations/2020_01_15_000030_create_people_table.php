<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'people';

    /**
     * Run the migrations.
     * @table people
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('NAME');
            $table->string('APPPASSWORD')->nullable()->default(null);
            $table->string('CARD')->nullable()->default(null);
            $table->string('ROLE');
            $table->binary('IMAGE')->nullable()->default(null);

            $table->index(["ROLE"], 'PEOPLE_FK_1');

            $table->index(["CARD"], 'PEOPLE_CARD_INX');

            $table->unique(["NAME"], 'PEOPLE_NAME_INX');


//            $table->foreign('ROLE', 'PEOPLE_FK_1')
//                ->references('ID')->on('roles')
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
