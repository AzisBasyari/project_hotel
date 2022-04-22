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
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kamar_id');
            $table->foreign('kamar_id')->references('id')->on('kamars')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama');
            $table->string('email');
            $table->string('no_telepon');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('jumlah_kamar');
            $table->integer('total_harga');
            $table->enum('status', ['pending', 'checkin','checkout'])->default('pending');
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
        Schema::dropIfExists('reservasis');
    }
};
