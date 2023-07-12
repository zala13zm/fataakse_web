<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->text('description')->nullable();
            $table->double('discount', 8, 2)->default(0);
            $table->double('min_order_amount', 8, 2)->nullable();
            $table->double('max_coupon_amount', 8, 2)->nullable();
            $table->boolean('percentage')->default(true);
            $table->date('expires_on')->default(now());
            $table->integer('times')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('creator_id')->nullable()->constrained('users');
            $table->foreignId('vendor_id')->constrained('vendors');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
