<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateITFest5RegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_t_fest5_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->string('event_name');
            $table->string('registration_id', 20)->unique();
            $table->string('team');
            $table->string('member1');
            $table->string('member2');
            $table->string('member3');
            $table->string('member4');
            $table->string('institution');
            $table->string('class');
            $table->text('address');
            $table->string('mobile');
            $table->string('emergencycontact');
            $table->string('imagepath');
            $table->string('amount');
            $table->integer('payment_status', 1);
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
        Schema::dropIfExists('i_t_fest5_registrations');
    }
}
