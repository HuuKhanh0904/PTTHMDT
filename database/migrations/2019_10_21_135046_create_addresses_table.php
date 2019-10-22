<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('addresses'))
        {
            Schema::create('addresses', function (Blueprint $table) {
                $table->increments('address_id');
                $table->string('address_code',12)->unique()->comment('mã địa điểm');
                $table->string('address_name')->comment('tên địa điểm');

                
                $table->integer('city_id');
                $table->foreign('city_id')->references('city_id')->on('cities')->onCascade('cascade');
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
            DB::statement("ALTER TABLE `addresses` comment 'Lưu thông tin của Địa điểm của  một tour'");
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('addresses');
    }
}
