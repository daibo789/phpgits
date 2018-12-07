<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\CommonController;
use App\Http\Logic\UserWithdrawLogic;
use  App\Common\ReturnData;
class UserWithdrawController extends CommonController
{
    //
    protected $drawLogic;

    public function __construct(UserWithdrawLogic $drawLogic)
    {
        parent::__construct();
        $this->drawLogic = $drawLogic;
    }

    public function index()
    {
        $where['delete_time'] = 0;
        $posts = $this->drawLogic->getPaginate($where, array('id', 'desc'));
        $data['posts'] = $posts;
        return view('admin.UserWithdraw.index', $data);
    }


    public function edit()
    {
        if(!empty($_GET["id"])){$id = $_GET["id"];}else{$id="";}
        if(preg_match('/[0-9]*/',$id)){}else{exit;}

        $data['id'] = $id;
        $data['post'] = object_to_array(DB::table('user_withdraw')->where('id', $id)->first(), 1);

        return view('admin.UserWithdraw.edit', $data);
    }

    public function doedit()
    {
        if(!empty($_POST["id"])){$id = $_POST["id"];unset($_POST["id"]);}else {$id="";exit;}

        unset($_POST["_token"]);
        if(DB::table('user_withdraw')->where('id', $id)->update($_POST))
        {
            success_jump('修改成功', route('admin_user'));
        }
        else
        {
            error_jump('修改失败');
        }
    }


    public function changeStatus()
    {

        return ReturnData::create(ReturnData::FORBIDDEN);
        if(!empty($_POST["id"])){$id = $_POST["id"];unset($_POST["id"]);}else {$id="";exit;}

        unset($_POST["_token"]);

        if(!isset($_POST["type"])){return ReturnData::create(ReturnData::PARAMS_ERROR);}

        $user_withdraw = DB::table('user_withdraws')->where(['id'=>$id,'status'=>0])->first();
        if(!$user_withdraw){return ReturnData::create(ReturnData::PARAMS_ERROR);}

        //0拒绝，1成功
        if($_POST["type"]==0)
        {
            $data['status'] = 4;

            //增加用户余额
            DB::table('user')->where(array('id'=>$user_withdraw->user_id))->increment('money', $user_withdraw->money);
            //添加用户余额记录
            DB::table('user_money')->insert(array('user_id'=>$user_withdraw->user_id,'type'=>0,'money'=>$user_withdraw->money,'des'=>'提现失败-返余额','user_money'=>DB::table('user')->where(array('id'=>$user_withdraw->user_id))->value('money'),'add_time'=>time()));
        }
        elseif($_POST["type"]==1)
        {
            $data['status'] = 2;
        }

        if(isset($data))
        {
            $res = DB::table('user_withdraw')->where('id', $id)->update($data);

            if(!$res){return ReturnData::create(ReturnData::SYSTEM_FAIL);}
        }

        return ReturnData::create(ReturnData::SUCCESS);
    }
}
