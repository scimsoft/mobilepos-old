<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationCustomersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'reservation_customers';

    /**
     * Run the migrations.
     * @table reservation_customers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('CUSTOMER');

            $table->index(["CUSTOMER"], 'RES_CUST_FK_2');


//            $table->foreign('ID', 'reservation_customers_ID')
//                ->references('ID')->on('reservations')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('CUSTOMER', 'RES_CUST_FK_2')
//                ->references('ID')->on('customers')
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
