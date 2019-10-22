<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('cities'))
        {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('city_id');
            $table->string('city_code',12)->unique()->comment('mã thành phố');
            $table->string('city_name')->comment('tên thành phố');

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
        DB::statement("ALTER TABLE `cities` comment 'Tỉnh/thành phố'");
    }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('cities');
    }
}
