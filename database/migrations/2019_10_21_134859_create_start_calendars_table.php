<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('start_calendars'))
        {
            Schema::create('start_calendars', function (Blueprint $table) {
                $table->increments('start_calendar_id');
                $table->date('start_calendar_day_start')->comment('ngày khởi hành');
                $table->date('start_calendar_day_end')->comment('ngày về');
                $table->string('start_calendar_status',20)->comment('tình trạng');
                $table->string('start_calendar_price')->comment('giá');

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
            DB::statement("ALTER TABLE `start_calendars` comment 'Lịch khởi hành'");
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('start_calendars');
    }
}
