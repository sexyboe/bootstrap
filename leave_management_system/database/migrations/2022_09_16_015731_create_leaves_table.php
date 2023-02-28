<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->string('leave_type');
            $table->string('name');
            $table->string('status');
            $table->foreignID('user_id');
            $table->foreignID('employee_id');
            $table->string('department');
            $table->date('leave_date');
            $table->foreignId('position_id');
            $table->date('return_date');
            $table->string('total_day');
            $table->text('description');

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
        Schema::dropIfExists('leaves');
    }
};
