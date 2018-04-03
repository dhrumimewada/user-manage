<?php

use App\User;
use Illuminate\Database\Seeder;

class Usertableseeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		$administrator = new User();
		$administrator->name = 'Administrator';
		$administrator->email = 'administrator@dhrumi.com';
		$administrator->password = bcrypt('dhrumi@123');
		$administrator->location = '';
		$administrator->mobile_no = '';
		$administrator->area = '';
		$administrator->native_place = '';
		$administrator->isadmin = 1;
		$administrator->save();

	}
}
