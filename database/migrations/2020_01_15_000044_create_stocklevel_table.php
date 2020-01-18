<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocklevelTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'stocklevel';

    /**
     * Run the migrations.
     * @table stocklevel
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('LOCATION');
            $table->string('PRODUCT');
            $table->double('STOCKSECURITY')->nullable()->default(null);
            $table->double('STOCKMAXIMUM')->nullable()->default(null);

            $table->index(["PRODUCT"], 'STOCKLEVEL_PRODUCT');

            $table->index(["LOCATION"], 'STOCKLEVEL_LOCATION');


//            $table->foreign('LOCATION', 'STOCKLEVEL_LOCATION')
//                ->references('ID')->on('locations')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('PRODUCT', 'STOCKLEVEL_PRODUCT')
//                ->references('ID')->on('products')
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
