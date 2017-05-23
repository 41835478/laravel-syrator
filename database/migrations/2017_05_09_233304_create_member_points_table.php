<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class CreateMemberPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('member_points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->comment('会员id');
            $table->integer('product_id')->comment('产品id')->nullable();
            $table->decimal('cost')->comment('积分')->default('0');
            $table->string('title')->comment('积分订单名称')->default('');
            $table->timestamps();
            
            $table->comment = '会员积分明细表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('member_points');
    }
}
