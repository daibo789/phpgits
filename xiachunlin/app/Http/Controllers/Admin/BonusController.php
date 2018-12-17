<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Common\Helper;
use App\Common\ReturnData;
use App\Http\Logic\BonusLogic;
use Carbon\Carbon;
class BonusController extends CommonController
{
    protected $bonusLogic;

    public function __construct(BonusLogic $bonusLogic)
    {
        parent::__construct();
        $this->bonusLogic = $bonusLogic;
    }


    public function index(Request $request)
    {
        $res = '';
        $where = function ($query) use ($res) {
            if(isset($_REQUEST["keyword"]))
            {
                $query->where('name', 'like', '%'.$_REQUEST['keyword'].'%');
            }

            if(isset($_REQUEST["id"]))
            {
                $query->where('typeid', $_REQUEST["id"]);
            }
        };

        $posts = $this->bonusLogic->getPaginate($where, array('status', 'asc'));
        if($posts)
        {
            foreach($posts as $k=>$v)
            {

            }
        }

        $data['posts'] = $posts;

        return view('admin.bonus.index', $data);
    }

    public function add(Request $request)
    {
        if(Helper::isPostRequest())
        {

            if($_POST["start_time"]>=$_POST["end_time"]){error_jump('参数错误');}
//            $_POST['start_time'] = Carbon::parse($_POST["start_time"])->timestamp;
//            $_POST['end_time'] = Carbon::parse($_POST["end_time"])->timestamp;
            $res = $this->bonusLogic->add($_POST);
            if($res['code'] == ReturnData::SUCCESS)
            {
                success_jump($res['msg'], route('admin_bonus'));
            }

            error_jump($res['msg']);
        }

        return view('admin.bonus.add');
    }

    public function edit(Request $request)
    {
        if(!checkIsNumber($request->input('id',null))){error_jump('参数错误');}
        $id = $request->input('id');

        if(Helper::isPostRequest())
        {
            $where['id'] = $id;
//                dd($_POST);
            if($_POST["start_time"]>=$_POST["end_time"]){error_jump('参数错误');}
//            $_POST['start_time'] = Carbon::parse($_POST["start_time"])->timestamp;
//            $_POST['end_time'] = Carbon::parse($_POST["end_time"])->timestamp;
            $res = $this->bonusLogic->edit($_POST, $where);
            if($res['code'] == ReturnData::SUCCESS)
            {
                success_jump($res['msg'], route('admin_bonus'));
            }

            error_jump($res['msg']);
        }

        $data['id'] = $where['id'] = $id;
        $post = $this->bonusLogic->getOne($where);
        $data['post'] = $post;


        return view('admin.bonus.edit', $data);
    }

    public function del(Request $request)
    {
        if(!checkIsNumber($request->input('id',null))){error_jump('参数错误');}
        $id = $request->input('id');

        $where['id'] = $id;
        $res = $this->bonusLogic->del($where);
        if($res['code'] == ReturnData::SUCCESS)
        {
            success_jump($res['msg']);
        }

        error_jump($res['msg']);
    }
}
