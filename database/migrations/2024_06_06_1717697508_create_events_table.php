<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
			$table->string('img_url')->nullable()->default('');
			$table->string('name');
			$table->date('date');
			$table->string('time')->nullable()->default('');
			$table->string('address')->nullable()->default('');
			$table->string('gps_location')->nullable()->default('');
			$table->boolean('is_payed');
			$table->integer('price');
			$table->json('features');
			$table->text('description')->nullable()->default('');
			$table->softDeletes();
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
        Schema::dropIfExists('events');
    }
}
