<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('promotionals'))
        {
            Schema::create('promotionals', function (Blueprint $table) {
                $table->increments('promotional_id');
                $table->string('promotional_code',12)->unique()->comment('mã khuyến mãi');
                $table->string('promotional_name')->comment('tên khuyến mãi');
                $table->string('promotional_time_start')->comment('thời gian bất đầu');
                $table->string('promotional_time_end')->comment('thời gian kết thúc');
                $table->string('promotional_percent')->comment('phần trăm khuyến mãi');
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
            DB::statement("ALTER TABLE `promotionals` comment 'Lưu thông tin của khuyến mãi'");
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('promotionals');
    }
}
