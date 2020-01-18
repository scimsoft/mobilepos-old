<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'customers';

    /**
     * Run the migrations.
     * @table customers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('SEARCHKEY');
            $table->string('TAXID')->nullable()->default(null);
            $table->string('NAME');
            $table->string('TAXCATEGORY')->nullable()->default(null);
            $table->string('CARD')->nullable()->default(null);
            $table->double('MAXDEBT')->default('0');
            $table->string('ADDRESS')->nullable()->default(null);
            $table->string('ADDRESS2')->nullable()->default(null);
            $table->string('POSTAL')->nullable()->default(null);
            $table->string('CITY')->nullable()->default(null);
            $table->string('REGION')->nullable()->default(null);
            $table->string('COUNTRY')->nullable()->default(null);
            $table->string('FIRSTNAME')->nullable()->default(null);
            $table->string('LASTNAME')->nullable()->default(null);
            $table->string('EMAIL')->nullable()->default(null);
            $table->string('PHONE')->nullable()->default(null);
            $table->string('PHONE2')->nullable()->default(null);
            $table->string('FAX')->nullable()->default(null);
            $table->string('NOTES')->nullable()->default(null);
            $table->dateTime('CURDATE')->nullable()->default(null);
            $table->double('CURDEBT')->nullable()->default('0');
            $table->binary('IMAGE')->nullable()->default(null);

            $table->index(["TAXID"], 'CUSTOMERS_TAXID_INX');

            $table->index(["CARD"], 'CUSTOMERS_CARD_INX');

            $table->index(["NAME"], 'CUSTOMERS_NAME_INX');

            $table->index(["TAXCATEGORY"], 'CUSTOMERS_TAXCAT');

            $table->unique(["SEARCHKEY"], 'CUSTOMERS_SKEY_INX');


//            $table->foreign('TAXCATEGORY', 'CUSTOMERS_TAXCAT')
//                ->references('ID')->on('taxcustcategories')
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
