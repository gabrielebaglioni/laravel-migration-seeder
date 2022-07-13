<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateTrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('company', 30);
            $table->string('departure_station', 50);
            $table->string('arrival_station', 50);
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->string('train_code', 6)->unique();
            $table->unsignedTinyInteger('wagons_number');
            $table->boolean('is_in_time')->default(true);
            $table->boolean('is_deleted')->default(false);
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
        Schema::dropIfExists('trains');
    }
}
