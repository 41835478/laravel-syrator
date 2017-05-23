<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use Syrator\Data\SyratorSchema;

class EntrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create table for storing roles
        SyratorSchema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comment('角色名');
            $table->string('display_name')->nullable()->comment('角色展示名');
            $table->string('description')->nullable()->comment('描述');
            $table->timestamps();
            
            $table->comment = '角色表';
        });

        // Create table for associating roles to users (Many-to-Many)
        SyratorSchema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'role_id']);
            
            $table->comment = '用户的角色表';
        });

        // Create table for storing permissions
        SyratorSchema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comment('权限名');
            $table->string('display_name')->nullable()->comment('权限展示名');
            $table->string('description')->nullable()->comment('描述');
            $table->integer('pid')->unsigned()->comment('父id');
            $table->timestamps();
            
            $table->comment = '权限表';
        });

        // Create table for associating permissions to roles (Many-to-Many)
        SyratorSchema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
            
            $table->comment = '角色的权限表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop('permissions');
        Schema::drop('role_user');
        Schema::drop('roles');
    }
}
