<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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
            Schema::create('posts', function (Blueprint $table) {
                $table->increments('post_id');
                $table->string('post_title',100)->comment('tieu de bai dang');
                $table->string('post_slug',100)->unique()->comment('slug bai dang');
                $table->string('post_content')->comment('noi dung bai dang');
                $table->dateTime('post_datetime')->comment('thoi gian dang');

                
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('user_id')->on('users')->onCascade('cascade');

                $table->integer('category_id')->unsigned();
                $table->foreign('category_id')->references('category_id')->on('categories')->onCascade('cascade');

                $table->integer('transport_id')->unsigned();
                $table->foreign('transport_id')->references('transport_id')->on('transports')->onCascade('cascade');

                $table->integer('service_id')->unsigned();
                $table->foreign('service_id')->references('service_id')->on('services')->onCascade('cascade');


                $table->integer('air_ticket_id')->unsigned();
                $table->foreign('air_ticket_id')->references('air_ticket_id')->on('air_tickets')->onCascade('cascade');

                $table->integer('hotel_id')->unsigned();
                $table->foreign('hotel_id')->references('hotel_id')->on('hotels')->onCascade('cascade');
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
            DB::statement("ALTER TABLE `posts` comment 'Lưu thông tin của bài đăng'");
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('posts');
    }
}
