<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCryptoDetailsColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crypto_details', function (Blueprint $table) {
            $table->decimal('crypto_high')->decimal('amount', 10, 2)->change();
            $table->decimal('crypto_low')->decimal('amount', 10, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crypto_details', function (Blueprint $table) {
            $table->decimal('crypto_high')->nullable()->change();
            $table->decimal('crypto_low')->nullable()->change();
        });
    }
}
