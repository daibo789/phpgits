<?php
/**
 * Created by PhpStorm.
 * User: daibo
 * Date: 2018/12/5
 * Time: 5:01 PM
 */

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;

use DB;
use Ramsey\Uuid\Uuid;
class CommonController
{

    public function __construct()
    {
    }

    /**
     * 获取分页数据及分页导航
     * @param string $modelname 模块名与数据库表名对应
     * @param array  $where     查询条件
     * @param string $orderby   查询排序
     * @param string $field     要返回数据的字段
     * @param int    $listRows  每页数量，默认30条
     *
     * @return 格式化后输出的数据。内容格式为：
     *     - "code"                 (string)：代码
     *     - "info"                 (string)：信息提示
     *
     *     - "result" array
     *
     *     - "img_list"             (array) ：图片队列，默认8张
     *     - "img_title"            (string)：车图名称
     *     - "img_url"              (string)：车图片url地址
     *     - "car_name"             (string)：车名称
     */
    public function pageList($modelname, $where = '', $orderby = '', $field = '*', $listRows = 30)
    {
        $model = \DB::table($modelname);

        //查询条件
        if(!empty($where)){$model = $model->where($where);}

        //排序
        if($orderby!='')
        {
            if($orderby == 'rand()')
            {
                $model = $model->orderBy(\DB::raw('rand()'));
            }
            else
            {
                if(count($orderby) == count($orderby, 1))
                {
                    $model = $model->orderBy($orderby[0], $orderby[1]);
                }
                else
                {
                    foreach($orderby as $row)
                    {
                        $model = $model->orderBy($row[0], $row[1]);
                    }
                }
            }
        }
        else
        {
            $model = $model->orderBy('id', 'desc');
        }

        //要返回的字段
        if($field!='*'){$model = $model->select(\DB::raw($field));}

        return $model->paginate($listRows);
    }

    /**获取用户token 可以传useid
     * @param string $useid
     * @return mixed
     */
    public function getUserToken($useid = ''){
        $data = Uuid::uuid1();
        $str = $data->getHex();    //32位字符串方法
        return $str;
    }

    /**
     * 成功信息
     * @param $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function success($message)
    {
        return response()->json(['message' => $message, 'valid' => 1]);
    }

    /**
     * 错误信息
     * @param $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function error($message)
    {
        return response()->json(['message' => $message, 'valid' => 0]);
    }
}