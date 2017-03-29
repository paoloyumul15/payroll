<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_periods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->dateTime('pay_out_date');

            $table->foreign('company_id')->references('id')->on('companies')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pay_periods');
    }
}
