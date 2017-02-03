<?php

use Illuminate\Database\Seeder;

class AssignTeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assign_team')->insert([
            'team_id' => 1,
            'member_id' => 1,
        ]);
    }
}
