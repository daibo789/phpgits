<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Logic\SlideLogic;
use App\Common\Helper;
use App\Common\ReturnData;

class SlideController extends CommonController
{
    protected $slideLogic;
    public function __construct(SlideLogic $slideLogic)
    {
        parent::__construct();
        $this->slideLogic = $slideLogic;
    }


    public function index(Request $request)
    {


        $res = '';
        $where = function ($query) use ($res) {
            if(isset($_REQUEST["keyword"]))
            {
                $query->where('title', 'like', '%'.$_REQUEST['keyword'].'%');
            }

            if(isset($_REQUEST["group_id"]))
            {
                $query->where('group_id', $_REQUEST["group_id"]);
            }

            if(isset($_REQUEST["is_show"]))
            {
                $query->where('is_show', $_REQUEST["is_show"]);
            }

            if(isset($_REQUEST["type"]))
            {
                $query->where('type', $_REQUEST["type"]);
            }
        };

        $posts = $this->slideLogic->getPaginate($where, array('listorder', 'asc'));
        $data['posts'] = $posts;
        return view('admin.slide.index', $data);
    }

    public function add(Request $request)
    {
        return view('admin.slide.add');
    }

    public function doadd(Request $request)
    {
        if(Helper::isPostRequest())
        {
            $res = $this->slideLogic->add($_POST);
            if($res['code'] == ReturnData::SUCCESS)
            {
                success_jump($res['msg'], route('admin_slide'));
            }

            error_jump($res['msg']);
        }
    }

    public function edit(Request $request)
    {
        if(!checkIsNumber($request->input('id',null))){error_jump('参数错误');}
        $id = $request->input('id');

        $data['id'] = $where['id'] = $id;
        $data['post'] = $this->slideLogic->getOne($where);

        return view('admin.slide.edit', $data);
    }

    public function doedit(Request $request)
    {
        if(!checkIsNumber($request->input('id',null))){error_jump('参数错误');}
        $id = $request->input('id');

        if(Helper::isPostRequest())
        {
            $where['id'] = $id;
            $res = $this->slideLogic->edit($_POST, $where);
            if($res['code'] == ReturnData::SUCCESS)
            {
                success_jump($res['msg'], route('admin_slide'));
            }

            error_jump($res['msg']);
        }
    }

    public function del(Request $request)
    {
        if(!checkIsNumber($request->input('id',null))){error_jump('参数错误');}
        $id = $request->input('id');

        $where['id'] = $id;
        $res = $this->slideLogic->del($where);
        if($res['code'] == ReturnData::SUCCESS)
        {
            success_jump($res['msg']);
        }

        error_jump($res['msg']);
    }

}
