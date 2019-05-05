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
        Schema::table('profiles', function (Blueprint $table) {
           
            
            $table->string('drt')->nullable()->default(null)->change();
            $table->string('cnh')->nullable()->default(null)->change();

            $table->string('rg')->nullable()->default(null)->change();
            $table->string('organ')->nullable()->default(null)->change();
            $table->string('cpf')->nullable()->default(null)->change();


            $table->text('address')->nullable()->default(null)->change();
            $table->string('phone_number')->nullable()->default(null)->change();

            $table->string('marital_status')->nullable()->default(null)->change();
            $table->string('education')->nullable()->default(null)->change();
            $table->string('city_birth')->nullable()->default(null)->change();

            $table->string('height')->nullable()->default(null)->change();
            $table->string('weight')->nullable()->default(null)->change();
            
            $table->string('shirt')->nullable()->default(null)->change();
            $table->string('pants')->nullable()->default(null)->change();
            $table->string('feet')->nullable()->default(null)->change();
            
            $table->string('dummy')->nullable()->default(null)->change();
            $table->string('bust')->nullable()->default(null)->change();
            $table->string('waist')->nullable()->default(null)->change();
            $table->string('hip')->nullable()->default(null)->change();

            $table->string('skin_color')->nullable()->default(null)->change();
            $table->string('eye_color')->nullable()->default(null)->change();
            $table->string('hair_color')->nullable()->default(null)->change();

            $table->string('hair_type')->nullable()->default(null)->change();
            $table->string('hair_size')->nullable()->default(null)->change();

            $table->string('tattoo_location')->nullable()->default(null)->change();

            $table->string('practice_sports')->nullable()->default(null)->change();
            $table->string('play_instrument')->nullable()->default(null)->change();


            $table->string('bank_nro')->nullable()->default(null)->change();
            $table->string('back_agency')->nullable()->default(null)->change();

            $table->string('bank_account')->nullable()->default(null)->change();
            $table->string('bank_holder_name')->nullable()->default(null)->change();
            $table->string('bank_holder_cpf')->nullable()->default(null)->change();

            $table->string('tutor_name')->nullable()->default(null)->change();
            $table->string('tutor_rg')->nullable()->default(null)->change();
            $table->string('tutor_organ')->nullable()->default(null)->change();
            $table->string('tutor_cpf')->nullable()->default(null)->change();
            
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
