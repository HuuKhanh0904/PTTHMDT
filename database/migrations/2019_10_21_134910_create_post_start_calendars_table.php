<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostStartCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('post_start_calendars'))
        {
            Schema::create('post_start_calendars', function (Blueprint $table) {
                $table->increments('post_start_id');

                $table->integer('post_id')->unsigned();
                $table->foreign('post_id')->references('post_id')->on('posts')->onCascade('cascade');


                $table->integer('start_calendar_id')->unsigned();
                $table->foreign('start_calendar_id')->references('start_calendar_id')->on('start_calendars')->onCascade('cascade');


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
            DB::statement("ALTER TABLE `post_start_calendars` comment 'Thể loại bài đăng'");
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('post_start_calendars');
    }
}
