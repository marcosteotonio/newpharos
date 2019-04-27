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
            $table->increments('id');
            $table->integer('user_id')->unsigned();
           
            $table->string('slug');
            $table->string('fancy_name');
            
            $table->string('drt')->nullable();
            $table->string('cnh')->nullable();

            $table->string('rg');
            $table->string('organ');
            $table->string('cpf');

            $table->date('date_birth');
            $table->string('gender')->enum(['feminino', 'masculino'])->default('masculino');

            $table->text('address');
            $table->string('phone_number');

            $table->string('marital_status');
            $table->string('education');
            $table->string('city_birth');

            $table->string('height');
            $table->string('weight');
            
            $table->string('shirt');
            $table->string('pants');
            $table->string('feet');
            
            $table->string('dummy');
            $table->string('bust')->nullable();
            $table->string('waist')->nullable();
            $table->string('hip')->nullable();

            $table->string('skin_color');
            $table->string('eye_color');
            $table->string('hair_color');

            $table->string('hair_type');
            $table->string('hair_size');

            $table->boolean('tattoo')->default(0);
            $table->string('tattoo_location');

            $table->string('practice_sports');
            $table->string('play_instrument');

            $table->boolean('film_outside')->default(0);
            $table->boolean('make_figuration')->default(0);
            $table->boolean('make_event')->default(0);

            $table->string('bank_nro');
            $table->string('back_agency');

            $table->string('bank_account');
            $table->string('bank_holder_name');
            $table->string('bank_holder_cpf');

            $table->string('tutor_name')->nullable();
            $table->string('tutor_rg')->nullable();
            $table->string('tutor_organ')->nullable();
            $table->string('tutor_cpf')->nullable();
            
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
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
