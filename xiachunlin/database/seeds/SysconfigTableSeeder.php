<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Model\Admin\Sysconfig;
class SysconfigTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        $list = array (
            0 =>
                array (
                    'id' => 1,
                    'varname' => 'CMS_WEBNAME',
                    'info' => '网站名称',
                    'value' => '阳光学校系统',
                    'is_show' => 0,
                ),
            1 =>
                array (
                    'id' => 2,
                    'varname' => 'CMS_BASEHOST',
                    'info' => '站点根网址',
                    'value' => 'http://laraveladmin.com:8888',
                    'is_show' => 0,
                ),
            2 =>
                array (
                    'id' => 3,
                    'varname' => 'CMS_UPLOADS',
                    'info' => '图片/上传文件默认路径',
                    'value' => '/uploads',
                    'is_show' => 0,
                ),
            3 =>
                array (
                    'id' => 4,
                    'varname' => 'CMS_CSS',
                    'info' => 'css默认存放路径',
                    'value' => '/css',
                    'is_show' => 0,
                ),
            4 =>
                array (
                    'id' => 5,
                    'varname' => 'CMS_JS',
                    'info' => 'js默认存放路径',
                    'value' => '/js',
                    'is_show' => 0,
                ),
            5 =>
                array (
                    'id' => 6,
                    'varname' => 'CMS_INDEXNAME',
                    'info' => '主页链接名',
                    'value' => '首页',
                    'is_show' => 0,
                ),
            6 =>
                array (
                    'id' => 7,
                    'varname' => 'CMS_POWERBY',
                    'info' => '网站版权信息',
                    'value' => 'Copyright &copy; LQYCMS 版权所有',
                    'is_show' => 0,
                ),
            7 =>
                array (
                    'id' => 8,
                    'varname' => 'CMS_IMGWIDTH',
                    'info' => '缩略图默认宽度',
                    'value' => '240',
                    'is_show' => 0,
                ),
            8 =>
                array (
                    'id' => 9,
                    'varname' => 'CMS_IMGHEIGHT',
                    'info' => '缩略图默认高度',
                    'value' => '180',
                    'is_show' => 0,
                ),
            9 =>
                array (
                    'id' => 10,
                    'varname' => 'CMS_SEOTITLE',
                    'info' => '网站seotitle',
                    'value' => 'lqycms是一套完全免费、开源、无授权限制的网站管理系统',
                    'is_show' => 0,
                ),
            10 =>
                array (
                    'id' => 11,
                    'varname' => 'CMS_KEYWORDS',
                    'info' => '网站关键词Keywords',
                    'value' => 'lqycms,无授权限制网站系统cms,免费cms系统,开源网站管理系统,开源cms',
                    'is_show' => 0,
                ),
            11 =>
                array (
                    'id' => 12,
                    'varname' => 'CMS_DESCRIPTION',
                    'info' => '网站描述',
                    'value' => 'lqycms完全免费、开源、无授权限制，您可以使用lqycms在任何商业或者非商业网站上使用而不必支付任何费用，系统采用主流的mvc架构开发，更加容易进行二次开发。',
                    'is_show' => 0,
                ),
            12 =>
                array (
                    'id' => 13,
                    'varname' => 'CMS_ISCACHE',
                    'info' => '是否开启缓存，1开启，0关闭',
                    'value' => '1',
                    'is_show' => 0,
                ),
            13 =>
                array (
                    'id' => 14,
                    'varname' => 'CMS_MAXARC',
                    'info' => '最大返回列表结果数，默认300',
                    'value' => '300',
                    'is_show' => 0,
                ),
            14 =>
                array (
                    'id' => 15,
                    'varname' => 'CMS_PAGESIZE',
                    'info' => '列表每页显示的数量，默认15',
                    'value' => '15',
                    'is_show' => 0,
                ),
            15 =>
                array (
                    'id' => 16,
                    'varname' => 'CMS_SIGN_POINT',
                    'info' => '签到积分',
                    'value' => '5',
                    'is_show' => 0,
                ),
            16 =>
                array (
                    'id' => 17,
                    'varname' => 'CMS_WX_APPID',
                    'info' => '微信appid',
                    'value' => 'wx3d216119fe23ef10',
                    'is_show' => 0,
                ),
            17 =>
                array (
                    'id' => 18,
                    'varname' => 'CMS_WX_APPSECRET',
                    'info' => '微信appsecret',
                    'value' => 'dc8a69f061f595ea4db0d7f0e52fc971',
                    'is_show' => 0,
                ),
            18 =>
                array (
                    'id' => 19,
                    'varname' => 'CMS_WX_MCHID',
                    'info' => '微信支付商户号',
                    'value' => '1503321381',
                    'is_show' => 0,
                ),
            19 =>
                array (
                    'id' => 20,
                    'varname' => 'CMS_WXSHAER_TITLE',
                    'info' => '微信分享标题',
                    'value' => '微信分享测试-标题',
                    'is_show' => 0,
                ),
            20 =>
                array (
                    'id' => 21,
                    'varname' => 'CMS_WXSHAER_DESC',
                    'info' => '微信分享描述',
                    'value' => '微信分享描述',
                    'is_show' => 0,
                ),
            21 =>
                array (
                    'id' => 22,
                    'varname' => 'CMS_WXSHAER_LINK',
                    'info' => '微信分享链接',
                    'value' => 'http://www.lqycms.com/weixin',
                    'is_show' => 0,
                ),
            22 =>
                array (
                    'id' => 23,
                    'varname' => 'CMS_WXSHAER_IMGURL',
                    'info' => '微信分享图标',
                    'value' => 'http://www.lqycms.com/images/weixin/no_user.jpg',
                    'is_show' => 0,
                ),
            23 =>
                array (
                    'id' => 24,
                    'varname' => 'CMS_MIN_WITHDRAWAL_MONEY',
                    'info' => '最低提现金额(元)',
                    'value' => '100',
                    'is_show' => 0,
                ),
            24 =>
                array (
                    'id' => 25,
                    'varname' => 'CMS_SHOPPING_POINT',
                    'info' => '购物赠送积分',
                    'value' => '10',
                    'is_show' => 0,
                ),
            25 =>
                array (
                    'id' => 26,
                    'varname' => 'CMS_COMMISSION_PERCENT',
                    'info' => '推介赚钱计划-提成比例(5%)',
                    'value' => '0.05',
                    'is_show' => 0,
                ),
        );

        foreach ($list as $value){
            Sysconfig::create($value);
        }

    }
}
