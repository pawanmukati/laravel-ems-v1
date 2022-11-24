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
        Schema::create('leave', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('leave_type');
            $table->date('leave_from');
            $table->date('leave_to');
            $table->string('leave_description');
            $table->string('requested-days');
            $table->integer('leave_status');
            $table->string('oa_remark');
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
        Schema::dropIfExists('leave');
    }
};
