<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->smallInteger('age')->unsigned();
            $table->date('birth_date');
            $table->enum('gender', ['M', 'F']);
            $table->enum('civil_status', ['SI', 'MA', 'SE', 'DI', 'WI']);
            $table->string('place_of_birth', 50);
            $table->text('address', 250);
            $table->string('telephone_number', 50);
            $table->string('mobile_number', 50);
            $table->date('date_hired');
            $table->date('date_end');
            $table->string('sss_number', 30);
            $table->string('phil_health_number', 30);
            $table->string('pagibig_number', 30);
            $table->string('tin_number', 30);
            $table->string('account_number', 30);
            $table->string('status', 30);

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
