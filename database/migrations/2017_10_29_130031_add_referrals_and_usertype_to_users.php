<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferralsAndUsertypeToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function($table) {
        $table->integer('usertype')->after('linkedin_url')->default('1');
        $table->string('referral_code')->unique()->after('linkedin_url');
        $table->string('referred_by')->after('linkedin_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function($table) {
        $table->dropColumn('usertype');
        $table->dropColumn('referral_code');
        $table->dropColumn('referred_by');

        });
    }
}
