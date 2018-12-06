<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\User_rank;
class User_ranksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User_rank::create([
            'id' => 1,
            'title' => '注册用户',
            'min_points' => 0,
            'max_points' => 10000,
            'discount' => 100,
            'listorder' => 50,
            'rank' => 0,
        ]);
        User_rank::create([
            'id' => 2,
            'title' => 'Vip',
            'min_points' => 10000,
            'max_points' => 1000000,
            'discount' => 95,
            'listorder' => 50,
            'rank' => 0,
        ]);
        User_rank::create([
            'id' => 3,
            'title' => '代销用户',
            'min_points' => 0,
            'max_points' => 0,
            'discount' => 95,
            'listorder' => 50,
            'rank' => 0,
        ]);
    }
}
