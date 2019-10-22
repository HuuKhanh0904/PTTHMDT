<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('payments'))
        {
            Schema::create('payments', function (Blueprint $table) {
                $table->increments('payment_id');
                $table->string('payment_code',12)->unique()->comment('mã thanh toán');
                $table->string('payment_name')->comment('tên thanh toán');

                $table->integer('payment_type_id')->unsigned();
                $table->foreign('payment_type_id')->references('payment_type_id')->on('payment_types')->onCascade('cascade');


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
            DB::statement("ALTER TABLE `payments` comment 'Thanh toán'");
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('payments');
    }
}
