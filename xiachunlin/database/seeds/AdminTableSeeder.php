<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\admin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        admin::create([
            'username' => 'admin',
            'pwd' => md5('123456'),
            'email' => 'daibo@789.com',
            'mobile' => '1312121211',
            'avatar' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1544074585574&di=c73dc8a7d25ba0b8b3e83067e396214d&imgtype=0&src=http%3A%2F%2Fimg3.duitang.com%2Fuploads%2Fitem%2F201507%2F11%2F20150711195725_AacTw.jpeg',
            'status' => 0,
            'role_id' => 1,
            'logintime' => time(),
        ]);

        admin::create([
            'username' => 'xia',
            'pwd' => md5('123456'),
            'email' => 'daibo@789.com',
            'mobile' => '1312121211',
            'avatar' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1544074585574&di=c73dc8a7d25ba0b8b3e83067e396214d&imgtype=0&src=http%3A%2F%2Fimg3.duitang.com%2Fuploads%2Fitem%2F201507%2F11%2F20150711195725_AacTw.jpeg',
            'status' => 0,
            'role_id' => 3,
            'logintime' => time(),
        ]);
    }
}
