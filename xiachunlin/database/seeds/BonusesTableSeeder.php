<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\Bonus;
class BonusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list =(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => '用户红包',
                    'money' => 10.00,
                    'min_amount' => 0.0,
                    'point' => 0,
                    'status' => 1,
                    'add_time' => 0,
                    'num' => 100,
                    'delete_time' => 0,
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => '商品红包',
                    'money' => 10.00,
                    'min_amount' => 0.0,
                    'point' => 0,
                    'status' => 1,
                    'add_time' => 0,
                    'num' => 100,
                    'delete_time' => 0,
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => '订单红包',
                    'money' => 10.00,
                    'min_amount' => 0.0,
                    'point' => 0,
                    'status' => 1,
                    'add_time' => 0,
                    'num' => 100,
                    'delete_time' => 0,
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => '线下红包',
                    'money' => 10.00,
                    'min_amount' => 0.0,
                    'point' => 0,
                    'status' => 1,
                    'add_time' => 0,
                    'num' => 100,
                    'delete_time' => 0,
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => '大王红包',
                    'money' => 10.00,
                    'min_amount' => 0.0,
                    'point' => 0,
                    'status' => 1,
                    'add_time' => 0,
                    'num' => 100,
                    'delete_time' => 0,
                ),
        ));

        foreach($list as $value){
            Bonus::create($value);
        }
    }
}
