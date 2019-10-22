<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('hotels'))
        {
            Schema::create('hotels', function (Blueprint $table) {
                $table->increments('hotel_id');
                $table->string('hotel_code',12)->unique()->comment('mã khách sạn');
                $table->string('hotel_name')->comment('tên khách sạn');
                $table->string('hotel_star',40)->comment('số sao');
                $table->string('hotel_address',50)->comment('địa chỉ');
                
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
            DB::statement("ALTER TABLE `hotels` comment 'Khách sạn'");
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('hotels');
    }
}
