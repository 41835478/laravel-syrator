<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('');
            $table->string('content')->comment('')->default('');
            $table->string('images_urls')->comment('')->default('');
            $table->integer('reply_user_id')->comment('')->nullable();
            $table->string('reply_content')->comment('')->default('');
            $table->timestamps();
            $table->softDeletes();
            
            $table->comment = '意见反馈表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('feedback');
    }
}
