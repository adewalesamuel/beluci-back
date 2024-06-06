<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
			$table->string('logo_url')->nullable()->default('');
			$table->string('company_name')->nullable()->default('');
			$table->string('country_name')->nullable()->default('');
			$table->string('head_office')->nullable()->default('');
			$table->string('address')->nullable()->default('');
			$table->string('website_url')->nullable()->default('');
			$table->string('fullname')->nullable()->default('');
			$table->date('creation_date');
			$table->integer('employee_number');
			$table->string('legal_status')->nullable()->default('');
			$table->integer('share_capital');
			$table->string('sector')->nullable()->default('');
			$table->text('other_details')->nullable()->default('');
			$table->enum('company_category', [
                'Société non-résidente en CI', 
                'Société de moins de 1 Md CFA de CA', 
                'Société de plus de 1 Md CFA de CA'])->default('Société non-résidente en CI');
			$table->string('representative_fullname')->nullable()->default('');
			$table->string('position')->nullable()->default('');
			$table->string('nationality')->nullable()->default('');
			$table->string('email')->unique();
			$table->string('phone_number')->unique();
			$table->string('sales_representative_fullname')->nullable()->default('');
			$table->string('sales_representative_position')->nullable()->default('');
			$table->string('sales_representative_email')->nullable()->default('');
			$table->string('sales_representative_phone_number')->nullable()->default('');
			$table->string('cover_letter_url')->nullable()->default('');
			$table->string('photo_url')->nullable()->default('');
			$table->string('commercial_register_url')->nullable()->default('');
			$table->string('idcard_url')->nullable()->default('');
			$table->string('password')->unique();
			$table->foreignId('member_id')
			->constrained()
			->onDelete('cascade');
            $table->string('api_token');
            $table->timestamp('email_verified_at')->nullable();
			$table->rememberToken();
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
        Schema::dropIfExists('members');
    }
}
