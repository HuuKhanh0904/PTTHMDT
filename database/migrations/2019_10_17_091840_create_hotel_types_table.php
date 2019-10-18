<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('hotel_types'))
        {
            Schema::create('hotel_types', function (Blueprint $table) {
                $table->increments('hotel_type_id');
                $table->string('hotel_type_code',12)->unique()->comment('mã loại khách sạn');
                $table->string('hotel_type_name')->comment('tên loại khách sạn');
                $table->string('hotel_type_star')->comment('loại khách sạn mấy sao?');
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
            DB::statement("ALTER TABLE `hotel_types` comment 'Lưu thông tin của loại khách sạn'");
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('hotel_types');
    }
}
