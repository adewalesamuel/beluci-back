<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('slug')->unique();
			$table->string('display_img_url')->nullable()->default('');
			$table->text('description')->nullable()->default('');
			$table->boolean('is_pinned')->default(false)->nullable();
			$table->foreignId('member_id')
            ->nullable()
			->constrained()
			->nullOnDelete();
			$table->foreignId('forum_category_id')
			->constrained()
			->onDelete('cascade');
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
        Schema::dropIfExists('forums');
    }
}
