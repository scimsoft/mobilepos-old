<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDraweropenedTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'draweropened';

    /**
     * Run the migrations.
     * @table draweropened
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->timestamp('OPENDATE')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('NAME')->nullable()->default(null);
            $table->string('TICKETID')->nullable()->default(null);
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
