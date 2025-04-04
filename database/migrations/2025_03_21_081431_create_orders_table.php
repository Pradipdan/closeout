<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('order_number')->unique(); // Unique order ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('total_price', 10, 2);
            $table->decimal('shipping_fee', 10, 2)->default(0);
            $table->decimal('tax', 10, 2)->default(0);
            $table->string('payment_method')->nullable(); // e.g., 'Credit Card', 'PayPal'
            $table->text('shipping_address')->nullable();
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->timestamps(); // Adds created_at & updated_at
            $table->softDeletes(); // Adds deleted_at for soft deletion
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
