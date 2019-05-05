<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfilesNullableColumns extends Migration
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

            $table->string('rg')->nullable();
            $table->string('organ')->nullable();
            $table->string('cpf')->nullable();

            $table->date('date_birth');
            $table->string('gender')->enum(['feminino', 'masculino'])->default('masculino');

            $table->text('address')->nullable();
            $table->string('phone_number')->nullable();

            $table->string('marital_status')->nullable();
            $table->string('education')->nullable();
            $table->string('city_birth')->nullable();

            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            
            $table->string('shirt')->nullable();
            $table->string('pants')->nullable();
            $table->string('feet')->nullable();
            
            $table->string('dummy')->nullable();
            $table->string('bust')->nullable();
            $table->string('waist')->nullable();
            $table->string('hip')->nullable();

            $table->string('skin_color')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('hair_color')->nullable();

            $table->string('hair_type')->nullable();
            $table->string('hair_size')->nullable();

            $table->boolean('tattoo')->default(0);
            $table->string('tattoo_location')->nullable();

            $table->string('practice_sports')->nullable();
            $table->string('play_instrument')->nullable();

            $table->boolean('film_outside')->default(0);
            $table->boolean('make_figuration')->default(0);
            $table->boolean('make_event')->default(0);

            $table->string('bank_nro')->nullable();
            $table->string('back_agency')->nullable();

            $table->string('bank_account')->nullable();
            $table->string('bank_holder_name')->nullable();
            $table->string('bank_holder_cpf')->nullable();

            $table->string('tutor_name')->nullable();
            $table->string('tutor_rg')->nullable();
            $table->string('tutor_organ')->nullable();
            $table->string('tutor_cpf')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
