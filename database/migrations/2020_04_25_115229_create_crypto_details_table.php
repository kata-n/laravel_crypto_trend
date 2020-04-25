<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedinteger('crypto_id');
            $table->string('name');
            $table->string('name_ja');
            $table->decimal('crypto_high')->nullable;
            $table->decimal('crypto_low')->nullable;
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crypto_details');
    }
}
