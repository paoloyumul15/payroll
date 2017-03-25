<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable();
            $table->string('employee_id', 50);
            $table->string('first_name', 50);
            $table->string('middle_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 50);
            $table->string('password', 100);
            $table->enum('type', ['Admin', 'Employee']);
            $table->rememberToken();
            $table->timestamps();

            $table->unique(['employee_id', 'email']);
            $table->foreign('company_id')->references('id')->on('companies')
                ->onUpdate('cascade');
        });

        DB::table('users')->insert([
            'company_id' => '1',
            'employee_id' => 'Admin-12345',
            'first_name' => 'Admin',
            'middle_name' => '',
            'last_name' => '',
            'email' => 'admin@payroll.com',
            'password' => Hash::make('p@ssw0rd'),
            'type' => 'Admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
