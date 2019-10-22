<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('posts'))
        {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('category_id');
            $table->string('category_slug',50)->unique()->comment('slug the loai');
            $table->string('category_title',100)->comment('tieu de the loai');
            $table->string('category_name')->comment('ten the loai');
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
        DB::statement("ALTER TABLE `categories` comment 'Thể loại bài đăng'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
