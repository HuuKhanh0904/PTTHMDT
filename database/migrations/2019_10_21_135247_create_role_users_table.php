<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('role_users'))
        {
            Schema::create('role_users', function (Blueprint $table) {
                $table->increments('role_user_id');

                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('user_id')->on('users')->onCascade('cascade');

                $table->integer('role_id')->unsigned();
                $table->foreign('role_id')->references('role_id')->on('roles')->onCascade('cascade');

                // log time
                $table->timestamp('created_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('ngày tạo');
    
                 $table->timestamp('updated_at')
                     ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
                     ->comment('ngày cập nhật');
    
                 $table->timestamp('deleted_at')
                     ->nullable()
                     ->comment('ngày xóa tạm');
            });
            DB::statement("ALTER TABLE `role_users` comment 'Liên kết giữa người dùng và vai trò'");
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('role_users');
    }
}
