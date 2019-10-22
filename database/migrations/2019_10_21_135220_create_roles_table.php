<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('roles'))
        {
            Schema::create('roles', function (Blueprint $table) {
                $table->increments('role_id');
                $table->string('role_code',12)->unique()->comment('mã vai trò');
                $table->string('role_name')->comment('tên vai trò');
                $table->integer('role_level')->comment('mức độ vai trò');
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
            DB::statement("ALTER TABLE `roles` comment 'Vai trò người dùng'");
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('roles');
    }
}
