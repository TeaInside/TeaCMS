<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id');
            $table->string('username', 32);
            $table->enum('type', 
                [
                    'twitter',
                    'facebook',
                    'instagram',
                    'github',
                    'linkedin',
                    'medium'
                ]
            );
            $table->timestamps();

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('casecade')
                ->onUpdate('casecade');
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
