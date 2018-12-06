<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\Admin_role;

class Admin_roleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin_role::create([
            'name' => '超级管理员',
            'des' => '超级管理员',
            'pid' => 0,
            'status' => 0,
            'listorder' => 0,
        ]);

        Admin_role::create([
            'name' => '普通管理员',
            'des' => '普通管理员',
            'status' => 0,
            'pid' => 0,
            'listorder' => 1,
        ]);

    }
}
