<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SysconfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sysconfigs')->insert([
            'id' => '0',
            'varname' => 'wo',
            'info' => '阳光月薪',
            'value' => 'lihua',
            'is_show' => 0,
            'created_at'=> Carbon::now(),
        ]);
    }
}
