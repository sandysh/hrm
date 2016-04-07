<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->time('punch_in');
            $table->time('punch_out');
            $table->date('punch_date');
            $table->integer('total_hours');
            $table->string('marked_day');
            $table->string('punch_note');
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
        Schema::drop('records');
    }
}
