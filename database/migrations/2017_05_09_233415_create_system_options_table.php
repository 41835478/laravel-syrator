<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class CreateSystemOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('system_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('配置选项名');
            $table->text('value')->comment('配置选项值')->default('');
            $table->timestamps();
            $table->softDeletes();
            
            $table->comment = '系统配置表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('system_options');
    }
}
