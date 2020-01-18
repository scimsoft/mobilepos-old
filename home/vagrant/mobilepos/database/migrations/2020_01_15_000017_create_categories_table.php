<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'categories';

    /**
     * Run the migrations.
     * @table categories
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('NAME');
            $table->string('PARENTID')->nullable()->default(null);
            $table->binary('IMAGE')->nullable()->default(null);
            $table->string('TEXTTIP')->nullable()->default(null);
            $table->smallInteger('CATSHOWNAME')->default('1');

            $table->index(["PARENTID"], 'PARENTID');

            $table->unique(["NAME"], 'CATEGORIES_NAME_INX');


//             $table->foreign('PARENTID', 'PARENTID')
//                ->references('ID')->on('categories')
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
