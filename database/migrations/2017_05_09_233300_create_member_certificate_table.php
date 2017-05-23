<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Syrator\Data\SyratorSchema;

class CreateMemberCertificateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        SyratorSchema::create('member_certificate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->comment('会员id');
            $table->integer('rank_id')->comment('会员分组id')->default('0');
            $table->string('name')->comment('姓名')->default('');
            $table->tinyInteger('gender')->comment('性别')->default('0');
            $table->string('telephone')->comment('联系方式')->default('');
            $table->string('email')->comment('邮箱')->default('');
            $table->string('idcard')->comment('身份证')->default('');
            $table->string('company_name')->comment('公司名称')->default('');
            $table->string('company_address')->comment('公司地址')->default('');
            $table->string('company_type')->comment('公司类型')->default('');
            $table->string('company_employee_count')->comment('公司人数')->default('');
            $table->string('cases_image_urls')->comment('')->default('');
            $table->integer('verify_id')->comment('审核id')->nullable();
            $table->integer('verify_result')->comment('审核结果')->nullable();
            $table->string('verify_remark')->comment('审核意见')->nullable();
            $table->timestamps();
            
            $table->comment = '会员实名认证表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('member_certificate');
    }
}
