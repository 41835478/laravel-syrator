<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class CreateMemberRankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('member_rank', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('分组名称')->default('');
            $table->integer('min_points')->comment('最小积分值')->default('0');
            $table->integer('max_points')->comment('最大积分值')->default('0');
            $table->tinyInteger('discount')->comment('')->default('0');
            $table->tinyInteger('show_price')->comment('')->default('0');
            $table->tinyInteger('special_rank')->comment('')->default('0');
            $table->tinyInteger('is_recomm')->comment('')->default('0');
            $table->timestamps();
            
            $table->comment = '会员分组表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('member_rank');
    }
}
