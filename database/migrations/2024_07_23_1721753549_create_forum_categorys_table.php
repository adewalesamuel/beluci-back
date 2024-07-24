<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_categories', function (Blueprint $table) {
            $table->id();
			$table->string('display_img_url')->nullable()->default('');
			$table->string('name');
			$table->string('slug')->unique();
			$table->text('description')->nullable()->default('');
			$table->foreignId('forum_category_id')
            ->nullable()
			->constrained()
			->nullOnDelete();
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
        Schema::dropIfExists('forum_categories');
    }
}
