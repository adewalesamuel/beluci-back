<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
			$table->string('logo_url')->nullable()->default('');
			$table->string('favicon_url')->nullable()->default('');
			$table->string('name');
			$table->string('slogan')->nullable()->default('');
			$table->string('phone_number')->unique();
			$table->string('primary_color')->nullable()->default('');
			$table->string('secondary_color')->nullable()->default('');
			$table->text('copyright_text')->nullable()->default('');
			$table->string('footer_logo_url')->nullable()->default('');
			$table->boolean('is_up');
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
        Schema::dropIfExists('sites');
    }
}
