<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCryptoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crypto_details', function (Blueprint $table) {
            $table->decimal('crypto_high')->nullable()->change();
            $table->decimal('crypto_low')->nullable()->change();
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
            $table->decimal('crypto_high')->nullable(false)->change();
            $table->decimal('crypto_low')->nullable(false)->change();
        });
    }
}
