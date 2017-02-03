<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('members')->insert([
            'name' => 'dpatel',
            'email' => 'dpatel@gmail.com',
        ]);
    }
}
