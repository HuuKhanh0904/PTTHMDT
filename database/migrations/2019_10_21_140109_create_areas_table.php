<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('areas'))
        {
            Schema::create('areas', function (Blueprint $table) {
                $table->increments('areas_id');
                $table->string('areas_code',12)->unique()->comment('mã khu vực tour');
                $table->string('areas_name')->comment('tên loại tour');

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
            DB::statement("ALTER TABLE `areas` comment 'Lưu thông tin của khu vực tour'");
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('areas');
    }
}
