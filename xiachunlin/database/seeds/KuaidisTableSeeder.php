<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\Kuaidi;
class KuaidisTableSeeder extends Seeder
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
                    'name' => '顺丰',
                    'code' => 'shunfeng',
                    'money' => '0.00',
                    'country' => '',
                    'des' => '',
                    'tel' => '95338',
                    'website' => 'http://www.sf-express.com',
                    'listorder' => 50,
                    'status' => 0,
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'EMS',
                    'code' => 'ems',
                    'money' => '0.00',
                    'country' => 'CN',
                    'des' => '',
                    'tel' => '11183',
                    'website' => 'http://www.ems.com.cn/',
                    'listorder' => 50,
                    'status' => 0,
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => '申通',
                    'code' => 'shentong',
                    'money' => '0.00',
                    'country' => '',
                    'des' => '',
                    'tel' => '95543',
                    'website' => 'http://www.sto.cn',
                    'listorder' => 50,
                    'status' => 0,
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => '圆通',
                    'code' => 'yuantong',
                    'money' => '0.00',
                    'country' => '',
                    'des' => '',
                    'tel' => '95554',
                    'website' => 'http://www.yto.net.cn/',
                    'listorder' => 50,
                    'status' => 0,
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => '中通',
                    'code' => 'zhongtong',
                    'money' => '0.00',
                    'country' => '',
                    'des' => '',
                    'tel' => '95311',
                    'website' => 'http://www.zto.cn',
                    'listorder' => 50,
                    'status' => 0,
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => '汇通',
                    'code' => 'huitongkuaidi',
                    'money' => '0.00',
                    'country' => '',
                    'des' => '特指百世汇通、百世快递，百世物流（百世快运）请用baishiwuliu',
                    'tel' => '95320',
                    'website' => 'http://www.800bestex.com/',
                    'listorder' => 50,
                    'status' => 0,
                ),
            6 =>
                array (
                    'id' => 7,
                    'name' => '韵达',
                    'code' => 'yunda',
                    'money' => '0.00',
                    'country' => '',
                    'des' => '',
                    'tel' => '95546',
                    'website' => 'http://www.yundaex.com',
                    'listorder' => 50,
                    'status' => 0,
                ),
            7 =>
                array (
                    'id' => 8,
                    'name' => '宅急送',
                    'code' => 'zhaijisong',
                    'money' => '0.00',
                    'country' => '',
                    'des' => '',
                    'tel' => '400-6789-000',
                    'website' => 'http://www.zjs.com.cn',
                    'listorder' => 50,
                    'status' => 0,
                ),
            8 =>
                array (
                    'id' => 9,
                    'name' => '德邦',
                    'code' => 'debangwuliu',
                    'money' => '0.00',
                    'country' => '',
                    'des' => '',
                    'tel' => '95353',
                    'website' => 'http://www.deppon.com',
                    'listorder' => 50,
                    'status' => 0,
                ),
            9 =>
                array (
                    'id' => 10,
                    'name' => '天天',
                    'code' => 'tiantian',
                    'money' => '0.00',
                    'country' => '',
                    'des' => '',
                    'tel' => '400-188-8888',
                    'website' => 'http://www.ttkdex.com',
                    'listorder' => 50,
                    'status' => 0,
                ),
            10 =>
                array (
                    'id' => 11,
                    'name' => '全峰',
                    'code' => 'quanfengkuaidi',
                    'money' => '0.00',
                    'country' => '',
                    'des' => '',
                    'tel' => '400-100-0001',
                    'website' => 'http://www.qfkd.com.cn',
                    'listorder' => 50,
                    'status' => 0,
                ),
            11 =>
                array (
                    'id' => 12,
                    'name' => '邮政小包',
                    'code' => 'youzhengguonei',
                    'money' => '0.00',
                    'country' => '',
                    'des' => '',
                    'tel' => '',
                    'website' => '',
                    'listorder' => 50,
                    'status' => 0,
                ),
            12 =>
                array (
                    'id' => 13,
                    'name' => '国通快递',
                    'code' => 'guotongkuaidi',
                    'money' => '0.00',
                    'country' => '',
                    'des' => '',
                    'tel' => '',
                    'website' => '',
                    'listorder' => 50,
                    'status' => 0,
                ),
            13 =>
                array (
                    'id' => 14,
                    'name' => '快捷快递',
                    'code' => 'kuaijiesudi',
                    'money' => '0.00',
                    'country' => '',
                    'des' => '',
                    'tel' => '',
                    'website' => '',
                    'listorder' => 50,
                    'status' => 0,
                ),
        );

        foreach ($list as $value){
            Kuaidi::create($value);
        }
    }
}
