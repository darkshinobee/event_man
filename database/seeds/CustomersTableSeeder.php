<?php

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('customers')->insert([
            'first_name' => str_random(8),
            'last_name' => str_random(12),
            'email' => str_random(10).'@ticketroom.ng',
            'password' => bcrypt('secret'),
            'hits' => rand(0,50),
            'misses' => rand(0,20),
        ]);
    }
}
