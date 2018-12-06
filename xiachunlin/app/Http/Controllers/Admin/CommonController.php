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

class CommonController
{

    public function __construct()
    {

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