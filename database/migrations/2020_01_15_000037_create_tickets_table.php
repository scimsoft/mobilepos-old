<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tickets';

    /**
     * Run the migrations.
     * @table tickets
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->integer('TICKETTYPE')->default('0');
            $table->integer('TICKETID');
            $table->string('PERSON');
            $table->string('CUSTOMER')->nullable()->default(null);
            $table->integer('STATUS')->default('0');

            $table->index(["PERSON"], 'TICKETS_FK_2');

            $table->index(["CUSTOMER"], 'TICKETS_CUSTOMERS_FK');

            $table->index(["TICKETTYPE", "TICKETID"], 'TICKETS_TICKETID');


//            $table->foreign('CUSTOMER', 'TICKETS_CUSTOMERS_FK')
//                ->references('ID')->on('customers')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('PERSON', 'TICKETS_FK_2')
//                ->references('ID')->on('people')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('ID', 'tickets_ID')
//                ->references('ID')->on('receipts')
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
