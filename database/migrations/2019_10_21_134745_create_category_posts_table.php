<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('category_posts'))
        {
        Schema::create('category_posts', function (Blueprint $table) {
            $table->increments('category_post_id');

            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('post_id')->on('posts')->onCascade('cascade');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('categories')->onCascade('cascade');


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
        DB::statement("ALTER TABLE `category_posts` comment 'Liên kết giữa bài đăng và thể loại'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('category_posts');
    }
}
