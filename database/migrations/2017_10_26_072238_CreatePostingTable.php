<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('company_desc');
            $table->string('company_size');
            $table->string('logo_url');
            $table->string('location');
            $table->string('function');
            $table->string('role');
            $table->string('role_desc');
            $table->string('candidate_bg')->nullable();
            $table->string('start_date');
            $table->string('duration');
            $table->text('short_desc');
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
        Schema::dropIfExists('postings');
    }
}
