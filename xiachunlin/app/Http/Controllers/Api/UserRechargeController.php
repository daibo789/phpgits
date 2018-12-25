<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Common\ReturnData;
use App\Common\Helper;
use App\Common\Token;
use Log;
use DB;
use App\Model\Admin\UserRecharge;

class UserRechargeController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLogic()
    {
        return logic('UserRecharge');
    }

    public function userRechargeList(Request $request)
    {
        //参数
        $limit = $request->input('limit', 10);
        $offset = $request->input('offset', 0);
        if($request->input('status', null) != null && $request->input('status')!=-1){$where['status'] = $request->input('status');}
        $where['user_id'] = Token::$uid;

        $res = $this->getLogic()->getList($where, array('id', 'desc'), '*', $offset, $limit);

        return ReturnData::create(ReturnData::SUCCESS,$res);
    }

    public function userRechargeDetail(Request $request)
    {
        //参数
        if(!checkIsNumber($request->input('id',null))){return ReturnData::create(ReturnData::PARAMS_ERROR);}
        $id = $request->input('id');
        $where['id'] = $id;

        $res = $this->getLogic()->getOne($where);
        if(!$res)
        {
            return ReturnData::create(ReturnData::RECORD_NOT_EXIST);
        }

        return ReturnData::create(ReturnData::SUCCESS,$res);
    }

    //添加
    public function userRechargeAdd(Request $request)
    {
        if(Helper::isPostRequest())
        {
            $_POST['user_id'] = Token::$uid;

            return $this->getLogic()->add($_POST);
        }
    }

    //修改
    public function userRechargeUpdate(Request $request)
    {
        if(!checkIsNumber($request->input('id',null))){return ReturnData::create(ReturnData::PARAMS_ERROR);}
        $id = $request->input('id');

        if(Helper::isPostRequest())
        {
            unset($_POST['id']);
            $where['id'] = $id;
            $where['user_id'] = Token::$uid;

            return $this->getLogic()->edit($_POST,$where);
        }
    }

    //删除
    public function userRechargeDelete(Request $request)
    {
        if(!checkIsNumber($request->input('id',null))){return ReturnData::create(ReturnData::PARAMS_ERROR);}
        $id = $request->input('id');

        if(Helper::isPostRequest())
        {
            $where['id'] = $id;
            $where['user_id'] = Token::$uid;

            return $this->getLogic()->del($where);
        }
    }
}