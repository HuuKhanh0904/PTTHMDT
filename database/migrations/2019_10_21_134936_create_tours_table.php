<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tours'))
        {
            Schema::create('tours', function (Blueprint $table) {
                $table->increments('tour_id');
                $table->string('tour_code',12)->unique()->comment('mã tour');

                $table->string('tour_name')->comment('tên tour');
                $table->string('tour_time')->comment('thời gian đi. Ví dụ 3N2D');
                $table->string('tour_day_start')->comment('ngày khởi hành');
                $table->string('tour_price')->comment('giá tour');
                $table->text('tour_note')->comment('ghi chú');

                // loại tour
                $table->integer('tour_type_id')->unsigned();
                $table->foreign('tour_type_id')->references('tour_type_id')->on('tour_types')->onCascade('cascade');
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
            DB::statement("ALTER TABLE `tours` comment 'Lưu thông tin của tours du lịch'");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('tours');
    }
}
