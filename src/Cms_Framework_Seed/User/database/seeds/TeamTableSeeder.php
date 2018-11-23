<?php

namespace Cms_Framework_Seed;

use DB;
use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('teams')->insert([
            [
                'slug'          => 'default',
                'name'          => 'Default',
            ],
        ]);
    }
}
