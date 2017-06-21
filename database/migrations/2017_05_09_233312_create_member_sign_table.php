<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class CreateMemberSignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('member_sign', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->comment('会员id');
            $table->date('date')->comment('签到时间');
            $table->timestamps();
            $table->softDeletes();
            
            $table->comment = '会员签到记录表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('member_sign');
    }
}
