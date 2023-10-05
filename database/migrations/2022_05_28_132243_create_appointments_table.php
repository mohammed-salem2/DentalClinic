<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreignId('doctor_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreignId('schedule_id')
                ->references('id')
                ->on('schedules')
                ->onDelete('cascade');
            $table->string('date');
            $table->unique(['patient_id' , 'doctor_id' , 'schedule_id','date']);
            $table->tinyInteger('status');
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
        Schema::dropIfExists('appointments');
    }
}
