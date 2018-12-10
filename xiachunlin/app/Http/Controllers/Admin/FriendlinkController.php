<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Logic\FriendlinkLogic;
use  App\Common\Helper;
use App\Common\ReturnData;
class FriendlinkController extends CommonController
{
    protected $friendlinkLogic;
    public function __construct(FriendlinkLogic $friendlinkLogic)
    {
        parent::__construct();
        $this->friendlinkLogic = $friendlinkLogic;
    }

    public function index(Request $request)
    {
        $res = '';
        $where = function ($query) use ($res) {
            if(isset($_REQUEST["keyword"]))
            {
                $query->where('webname', 'like', '%'.$_REQUEST['keyword'].'%');
            }

            if(isset($_REQUEST["group_id"]))
            {
                $query->where('group_id', $_REQUEST["group_id"]);
            }
        };

        $posts = $this->friendlinkLogic->getPaginate($where, array('url', 'asc'));
        $data['posts'] = $posts;
        return view('admin.friendlink.index', $data);
    }

    public function add(Request $request)
    {
        return view('admin.friendlink.add');
    }

    public function doadd(Request $request)
    {
        if(Helper::isPostRequest())
        {
            $res = $this->friendlinkLogic->add($_POST);
            if($res['code'] == ReturnData::SUCCESS)
            {
                success_jump($res['msg'], route('admin_friendlink'));
            }

            error_jump($res['msg']);
        }
    }

    public function edit(Request $request)
    {
        if(!checkIsNumber($request->input('id',null))){error_jump('参数错误');}
        $id = $request->input('id');

        $data['id'] = $where['id'] = $id;
        $data['post'] = $this->friendlinkLogic->getOne($where);

        return view('admin.friendlink.edit', $data);
    }

    public function doedit(Request $request)
    {
        if(!checkIsNumber($request->input('id',null))){error_jump('参数错误');}
        $id = $request->input('id');

        if(Helper::isPostRequest())
        {
            $where['id'] = $id;
            $res = $this->friendlinkLogic->edit($_POST, $where);
            if($res['code'] == ReturnData::SUCCESS)
            {
                success_jump($res['msg'], route('admin_friendlink'));
            }

            error_jump($res['msg']);
        }
    }

    public function del(Request $request)
    {
        if(!checkIsNumber($request->input('id',null))){error_jump('参数错误');}
        $id = $request->input('id');

        $where['id'] = $id;
        $res = $this->friendlinkLogic->del($where);
        if($res['code'] == ReturnData::SUCCESS)
        {
            success_jump($res['msg']);
        }

        error_jump($res['msg']);
    }
}
