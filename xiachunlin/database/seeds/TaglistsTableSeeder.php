<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\Taglist;
class TaglistsTableSeeder extends Seeder
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
                    'tid' => 1,
                    'aid' => 2,
                ),
            1 =>
                array (
                    'id' => 2,
                    'tid' => 1,
                    'aid' => 5,
                ),
            2 =>
                array (
                    'id' => 3,
                    'tid' => 1,
                    'aid' => 13,
                ),
            3 =>
                array (
                    'id' => 4,
                    'tid' => 2,
                    'aid' => 10,
                ),
            4 =>
                array (
                    'id' => 5,
                    'tid' => 2,
                    'aid' => 12,
                ),
        ));

        foreach($list as $value){
            Taglist::create($value);
        }

    }
}
