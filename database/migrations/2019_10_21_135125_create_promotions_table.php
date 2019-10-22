<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('promotions'))
        {
            Schema::create('promotions', function (Blueprint $table) {
                $table->increments('promotion_id');
                $table->string('promotion_code',12)->unique()->comment('mã khuyến mãi');
                $table->string('promotion_name')->comment('tên khuyến mãi');
                $table->string('promotion_percent',20)->comment('phần trăm khuyến mãi');
                
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
            DB::statement("ALTER TABLE `promotions` comment 'Chương trình khuyến mãi đi kèm theo tour'");
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('promotions');
    }
}
