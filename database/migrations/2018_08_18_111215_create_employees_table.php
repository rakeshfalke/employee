<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->char('first_name', 45)->nullable(false);
            $table->char('father_name', 45)->nullable(true);
            $table->char('spouse_name', 45)->nullable(true);
            $table->dateTime('dob')->nullable(false);
            $table->char('pan', 255)->nullable(false);
            $table->char('social_security', 255)->nullable(true);
            $table->char('last_name', 45)->nullable(false);
            $table->enum('gender', ['male', 'female', 'other'])->nullable(false);
            $table->enum('marital_status', ['single', 'married', 'unmarried', 'divorced', 'widowed'])->nullable(false);
            $table->enum('title', ['Mr', 'Mrs', 'Miss', 'Ms', 'Sir', 'Dr', 'Lady'])->nullable(false);
            $table->char('primary_email', 255)->nullable(false);
            $table->char('other_email', 255)->nullable(true);
            $table->char('employee_id', 255)->nullable(false);
            $table->integer('nationality')->nullable(false);
            $table->integer('children');
            $table->dateTime('hire_date')->nullable(false);
            $table->integer('department')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
