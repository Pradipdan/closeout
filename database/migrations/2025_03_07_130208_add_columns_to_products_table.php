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
        Schema::table('products', function (Blueprint $table) {
            $table->string('brand')->nullable()->after('minimum_quntity');
            $table->string('location')->nullable()->after('brand');
            $table->string('roi')->nullable()->after('location');
            $table->string('expiration_date')->nullable()->after('roi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['brand', 'location', 'roi', 'expiration_date']);
        });
    }
};
