<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('detail_tours'))
        {
            Schema::create('detail_tours', function (Blueprint $table) {
                $table->increments('detail_tour_id');

                
                 // tour
                 $table->integer('tour_id')->unsigned();
                 $table->foreign('tour_id')->references('tour_id')->on('tours')->onCascade('cascade');

                  // transport
                $table->integer('transport_id')->unsigned();
                $table->foreign('transport_id')->references('transport_id')->on('transports')->onCascade('cascade');

                 // services
                 $table->integer('service_id')->unsigned();
                 $table->foreign('service_id')->references('service_id')->on('services')->onCascade('cascade');

                  // hotel
                $table->integer('hotel_id')->unsigned();
                $table->foreign('hotel_id')->references('hotel_id')->on('hotels')->onCascade('cascade');

                 // air tickets
                 $table->integer('air_ticket_id')->unsigned();
                 $table->foreign('air_ticket_id')->references('air_ticket_id')->on('air_tickets')->onCascade('cascade');

                  // promotion
                $table->integer('promotion_id')->unsigned();
                $table->foreign('promotion_id')->references('promotion_id')->on('promotions')->onCascade('cascade');

                // unit_prices
                $table->integer('unit_price_id')->unsigned();
                $table->foreign('unit_price_id')->references('unit_price_id')->on('unit_prices')->onCascade('cascade');

                // payments
                $table->integer('payment_id')->unsigned();
                $table->foreign('payment_id')->references('payment_id')->on('payments')->onCascade('cascade');
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
            DB::statement("ALTER TABLE `detail_tours` comment 'Chi tiết tour'");
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('detail_tours');
    }
}
