<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    User::query()->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    DB::table('users')->insert([
      'name' => 'user1',
      'email' => 'user1@gmail.com',
      'email_verified_at' => now(),
      'password' => bcrypt('user1'),
      'remember_token' => Str::random(10),
    ]);

    DB::table('users')->insert([
      'name' => 'user2',
      'email' => 'user2@gmail.com',
      'email_verified_at' => now(),
      'password' => bcrypt('user2'),
      'remember_token' => Str::random(10),
    ]);
  }
}
