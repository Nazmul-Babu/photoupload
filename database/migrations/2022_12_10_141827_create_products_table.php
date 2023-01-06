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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->longText('details');

            $table->string('product_name');

            $table->unsignedBigInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('admins');
            $table->dateTime('approved_date')->nullable();

            $table->unsignedBigInteger('buyout_by')->nullable();
            $table->foreign('buyout_by')->references('id')->on('admins');
            $table->dateTime('buyout_date')->nullable();
            $table->double('rate')->nullable();
            $table->enum('status',['pending','approved','declined','selling','buy-out','not-sellable'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
