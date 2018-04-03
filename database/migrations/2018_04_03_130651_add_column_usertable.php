<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddColumnUsertable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('users', function ($table) {
			$table->string('location')->after('password');
			$table->string('mobile_no')->after('location');
			$table->string('area')->after('mobile_no');
			$table->string('native_place')->after('area');
			$table->string('isadmin')->after('native_place');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('users', function ($table) {
			$table->dropColumn('location');
			$table->dropColumn('mobile_no');
			$table->dropColumn('area');
			$table->dropColumn('native_place');
			$table->dropColumn('isadmin');
		});
	}
}
