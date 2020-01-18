<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'payments';

    /**
     * Run the migrations.
     * @table payments
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('RECEIPT');
            $table->string('PAYMENT');
            $table->double('TOTAL')->default('0');
            $table->string('TRANSID')->nullable()->default(null);
            $table->binary('RETURNMSG')->nullable()->default(null);
            $table->string('NOTES')->nullable()->default(null);
            $table->double('TENDERED')->nullable()->default(null);
            $table->string('CARDNAME')->nullable()->default(null);

            $table->index(["PAYMENT"], 'PAYMENTS_INX_1');

            $table->index(["RECEIPT"], 'PAYMENTS_FK_RECEIPT');


//            $table->foreign('RECEIPT', 'PAYMENTS_FK_RECEIPT')
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
