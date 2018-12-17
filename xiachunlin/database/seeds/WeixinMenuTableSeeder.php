<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\WeixinMenu;
class WeixinMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $list = array (
            0 =>
                array (
                    'id' => 1,
                    'pid' => 0,
                    'addtime' => time(),
                    'name' => '新闻中心',
                    'type' => 'click',
                    'key' => 'V2_GOOD',
                    'url' => '',
                    'media_id' => '',
                    'appid' => '',
                    'pagepath' => '',
                    'litpic' => '',
                    'listorder' => 50,
                    'is_show' => 0,
                ),
            1 =>
                array (
                    'id' => 2,
                    'pid' => 0,
                    'addtime' => time(),
                    'name' => '案例中心',
                    'type' => 'click',
                    'key' => 'V1002_GOOD',
                    'url' => '',
                    'media_id' => '',
                    'appid' => '',
                    'pagepath' => '',
                    'litpic' => '',
                    'listorder' => 50,
                    'is_show' => 0,
                ),
            2 =>
                array (
                    'id' => 3,
                    'pid' => 1,
                    'addtime' => time(),
                    'name' => '行业新闻',
                    'type' => 'view',
                    'key' => '',
                    'url' => 'http://www.sina.com',
                    'media_id' => '',
                    'appid' => '',
                    'pagepath' => '',
                    'litpic' => '',
                    'listorder' => 50,
                    'is_show' => 0,
                ),
            3 =>
                array (
                    'id' => 4,
                    'pid' => 1,
                    'addtime' => time(),
                    'name' => '企业新闻',
                    'type' => 'view',
                    'key' => '',
                    'url' => 'https://www.baidu.com',
                    'media_id' => '',
                    'appid' => '',
                    'pagepath' => '',
                    'litpic' => '',
                    'listorder' => 50,
                    'is_show' => 0,
                ),
            4 =>
                array (
                    'id' => 5,
                    'pid' => 2,
                    'addtime' => time(),
                    'name' => '奥术大师',
                    'type' => 'view',
                    'key' => 'qwe',
                    'url' => 'http://www.baidu.com',
                    'media_id' => 'asdf',
                    'appid' => 'dsfhgf',
                    'pagepath' => 'gfhjgf',
                    'litpic' => '',
                    'listorder' => 50,
                    'is_show' => 0,
                ),
             );

        foreach ($list as $value){
            WeixinMenu::create($value);
        }

    }
}
