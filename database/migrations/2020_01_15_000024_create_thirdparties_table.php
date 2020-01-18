<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThirdpartiesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'thirdparties';

    /**
     * Run the migrations.
     * @table thirdparties
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ID');
            $table->string('CIF');
            $table->string('NAME');
            $table->string('ADDRESS')->nullable()->default(null);
            $table->string('CONTACTCOMM')->nullable()->default(null);
            $table->string('CONTACTFACT')->nullable()->default(null);
            $table->string('PAYRULE')->nullable()->default(null);
            $table->string('FAXNUMBER')->nullable()->default(null);
            $table->string('PHONENUMBER')->nullable()->default(null);
            $table->string('MOBILENUMBER')->nullable()->default(null);
            $table->string('EMAIL')->nullable()->default(null);
            $table->string('WEBPAGE')->nullable()->default(null);
            $table->string('NOTES')->nullable()->default(null);

            $table->unique(["NAME"], 'THIRDPARTIES_NAME_INX');

            $table->unique(["CIF"], 'THIRDPARTIES_CIF_INX');
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
