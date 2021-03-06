<?php

namespace App\Http\Controllers\Api;

use Log;
use DB;
use Illuminate\Http\Request;
use App\Common\ReturnData;
use App\Common\Helper;
use App\Common\Token;
use App\Model\Admin\UserBonus;
use UserBonusLogic;

class UserBonusController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLogic()
    {
        return logic('UserBonus');
    }

    public function userBonusList(Request $request)
    {
        //参数
        $limit = $request->input('limit', 10);
        $offset = $request->input('offset', 0);
        if($request->input('status', null) != null){$where['status'] = $request->input('status');}

        $where['user_id'] = Token::$uid;

        $res = $this->getLogic()->getList($where, array('id', 'desc'), '*', $offset, $limit);

        return ReturnData::create(ReturnData::SUCCESS,$res);
    }

    public function userBonusDetail(Request $request)
    {
        //参数
        if(!checkIsNumber($request->input('id',null))){return ReturnData::create(ReturnData::PARAMS_ERROR);}
        $id = $request->input('id');
        $where['id'] = $id;
        $where['user_id'] = Token::$uid;

        $res = $this->getLogic()->getOne($where);
        if(!$res)
        {
            return ReturnData::create(ReturnData::RECORD_NOT_EXIST);
        }

        return ReturnData::create(ReturnData::SUCCESS,$res);
    }

    //添加
    public function userBonusAdd(Request $request)
    {
        if(Helper::isPostRequest())
        {
            $_POST['user_id'] = Token::$uid;

            return $this->getLogic()->add($_POST);
        }
    }

    //修改
    public function userBonusUpdate(Request $request)
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
    public function userBonusDelete(Request $request)
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

    public function userAvailableBonusList(Request $request)
    {
        //参数
        $data['user_id'] = Token::$uid;

        $data['min_amount'] = $request->input('min_amount','');
        if($data['min_amount']=='')
        {
            return ReturnData::create(ReturnData::PARAMS_ERROR);
        }

        $res = $this->getLogic()->getAvailableBonusList($data);
        if($res)
        {
            return ReturnData::create(ReturnData::SUCCESS,$res);
        }

        return ReturnData::create(ReturnData::SYSTEM_FAIL);
    }
}
