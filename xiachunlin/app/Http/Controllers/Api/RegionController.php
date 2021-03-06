<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Region;
use App\Common\ReturnData;
class RegionController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLogic()
    {
        return logic('Region');
    }

    public function regionList(Request $request)
    {
        //参数
        $where['parent_id'] = $request->input('id', 86);

        $res = $this->getLogic()->getAll($where);

        /* if($res['count']>0)
        {
            foreach($res['list'] as $k=>$v)
            {

            }
        } */

        return ReturnData::create(ReturnData::SUCCESS,$res);
    }

    public function regionDetail(Request $request)
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
    public function regionAdd(Request $request)
    {
        if(Helper::isPostRequest())
        {
            return $this->getLogic()->add($_POST);
        }
    }

    //修改
    public function regionUpdate(Request $request)
    {
        if(!checkIsNumber($request->input('id',null))){return ReturnData::create(ReturnData::PARAMS_ERROR);}
        $id = $request->input('id');

        if(Helper::isPostRequest())
        {
            unset($_POST['id']);
            $where['id'] = $id;
            //$where['user_id'] = Token::$uid;

            return $this->getLogic()->edit($_POST,$where);
        }
    }

    //删除
    public function regionDelete(Request $request)
    {
        if(!checkIsNumber($request->input('id',null))){return ReturnData::create(ReturnData::PARAMS_ERROR);}
        $id = $request->input('id');

        if(Helper::isPostRequest())
        {
            $where['id'] = $id;
            //$where['user_id'] = Token::$uid;

            return $this->getLogic()->del($where);
        }
    }
}
