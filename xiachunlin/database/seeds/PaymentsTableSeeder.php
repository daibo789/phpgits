<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('payments')->delete();

        \DB::table('payments')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'pay_code' => 'balance',
                    'pay_name' => '余额支付',
                    'pay_fee' => '0.0',
                    'pay_des' => '使用帐户余额支付。只有会员才能使用，通过设置信用额度，可以透支。',
                    'pay_config' => 'a:0:{}',
                    'status' => 1,
                    'listorder' => 0,
                ),
            1 =>
                array (
                    'id' => 2,
                    'pay_code' => 'weixin',
                    'pay_name' => '微信',
                    'pay_fee' => '0.0',
                    'pay_des' => '微信',
                    'pay_config' => 'a:0:{}',
                    'status' => 1,
                    'listorder' => 0,
                ),
            2 =>
                array (
                    'id' => 3,
                    'pay_code' => 'alipay',
                    'pay_name' => '支付宝',
                    'pay_fee' => '0.0',
                    'pay_des' => '支付宝',
                    'pay_config' => 'a:0:{}',
                    'status' => 1,
                    'listorder' => 0,
                ),
            3 =>
                array (
                    'id' => 4,
                    'pay_code' => 'cod',
                    'pay_name' => '货到付款',
                    'pay_fee' => '0.0',
                    'pay_des' => '开通城市：×××
货到付款区域：×××',
                    'pay_config' => 'a:0:{}',
                    'status' => 0,
                    'listorder' => 0,
                ),
            4 =>
                array (
                    'id' => 5,
                    'pay_code' => 'bank',
                    'pay_name' => '银行汇款/转帐',
                    'pay_fee' => '0.0',
                    'pay_des' => '银行名称
收款人信息：全称 ××× ；帐号或地址 ××× ；开户行 ×××。
注意事项：办理电汇时，请在电汇单“汇款用途”一栏处注明您的订单号。',
                    'pay_config' => 'a:0:{}',
                    'status' => 0,
                    'listorder' => 0,
                ),
        ));
    }
}
