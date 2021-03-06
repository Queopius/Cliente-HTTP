<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$user = factory(User::class)->create([
			'name' => 'Admin',
			'email' => 'admin@admin.com',
			'password' => bcrypt('password'),
		]);
	}
}
