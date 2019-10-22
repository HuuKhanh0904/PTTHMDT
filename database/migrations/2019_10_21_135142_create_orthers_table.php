<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('orthers'))
        {
            Schema::create('orthers', function (Blueprint $table) {
                $table->increments('orther_id');
                $table->string('orther_code',12)->unique()->comment('mã đơn đặt tour');
                $table->string('orther_name')->comment('tên đơn đặt tour');
                $table->dateTime('orther_datetime')->comment('thời gian lập đơn');
                $table->string('orther_total_price')->comment('tổng tiền trên đơn');

                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('user_id')->on('users')->onCascade('cascade');

                $table->integer('tour_id')->unsigned();
                $table->foreign('tour_id')->references('tour_id')->on('tours')->onCascade('cascade');
                

                $table->integer('detail_tour_id')->unsigned();
                $table->foreign('detail_tour_id')->references('detail_tour_id')->on('detail_tours')->onCascade('cascade');


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
            DB::statement("ALTER TABLE `orthers` comment 'Đơn đặt tour của khách hàng'");
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('orthers');
    }
}
