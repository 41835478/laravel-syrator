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
            $table->string('name')->comment('名称')->default('');
            $table->string('description')->comment('描述')->default('');
            $table->timestamps();
            $table->softDeletes();
            
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
