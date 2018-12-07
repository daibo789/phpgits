<?php
/**
 * Created by PhpStorm.
 * User: daibo
 * Date: 2018/12/5
 * Time: 23:07
 */


//读取动态配置
function sysconfig($varname='')
{
    $sysconfig = cache('sysconfig');
    $res = '';

    if(empty($sysconfig))
    {
        cache()->forget('sysconfig');

        $sysconfig = \App\Model\Sysconfig::orderBy('id')->select('varname', 'value')->get()->toArray();

        cache(['sysconfig' => $sysconfig], \Carbon\Carbon::now()->addMinutes(86400));
    }

    if($varname != '')
    {
        foreach($sysconfig as $row)
        {
            if($varname == $row['varname'])
            {
                $res = $row['value'];
            }
        }
    }
    else
    {
        $res = $sysconfig;
    }

    return $res;
}


//对象转数组
function object_to_array($object, $get=0)
{

    $res = [];
    if(!empty($object))
    {
        if($get==0)
        {
            foreach($object as $key=>$value)
            {
                $res[$key] = (array)$value;
            }
        }
        elseif($get==1)
        {
            $res = (array)$object;
        }
    }
    return $res;
}




/**
 * 获取数据属性
 * @param $dataModel 数据模型
 * @param $data 数据
 * @return array
 */
function getDataAttr($dataModel,$data = [])
{
    if(empty($dataModel) || empty($data))
    {
        return false;
    }

    foreach($data as $k=>$v)
    {
        $_method_str=ucfirst(preg_replace_callback('/_([a-zA-Z])/', function ($match) {
            return strtoupper($match[1]);
        }, $k));

        $_method = 'get' . $_method_str . 'Attr';

        if(method_exists($dataModel, $_method))
        {
            $tmp = $k.'_text';
            $data->$tmp = $dataModel->$_method($data);
        }
    }

    return $data;
}


//判断是否为数字
function checkIsNumber($data)
{
    if($data == '' || $data == null)
    {
        return false;
    }

    if(preg_match("/^\d*$/",$data))
    {
        return true;
    }

    return false;
}


/**
 * 调用逻辑接口
 * @param $name 逻辑类名称
 * @param array $config 配置
 * @return object
 */
function logic($name = '', $config = [])
{
    static $instance = [];
    $guid = $name . 'Logic';
    if (!isset($instance[$guid]))
    {
        $class = 'App\\Http\\Logic\\' . ucfirst($name) . 'Logic';

        if (class_exists($class))
        {
            $logic = new $class($config);
            $instance[$guid] = $logic;
        }
        else
        {
            throw new Exception('class not exists:' . $class);
        }
    }

    return $instance[$guid];
}

/**
 * 实例化（分层）模型
 * @param $name 模型类名称
 * @param array $config 配置
 * @return object
 */
function model($name = '', $config = [])
{
    static $instance = [];
    $guid = $name . 'Model';
    if (!isset($instance[$guid]))
    {
        $class = '\\App\\Model\\' . ucfirst($name);
        if (class_exists($class))
        {
            $model = new $class($config);
            $instance[$guid] = $model;
        }
        else
        {
            throw new Exception('class not exists:' . $class);
        }
    }

    return $instance[$guid];
}


//获取表所有字段
function get_table_columns($table, $field='')
{
    $res = \Illuminate\Support\Facades\Schema::getColumnListing($table);

    if($field != '')
    {
        //判断字段是否在表里面
        if(in_array($field, $res))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    return $res;
}

//将栏目列表生成数组
function get_category($modelname, $parent_id=0, $pad=0)
{
    $arr = array();

    $temp = \DB::table($modelname)->where('pid', $parent_id);
    if(get_table_columns($modelname, 'listorder'))
    {
        $temp = $temp->orderBy('listorder', 'asc');
    }
    else
    {
        $temp = $temp->orderBy('id', 'asc');
    }

    $temp = $temp->get();

    $cats = object_to_array($temp);

    if($cats)
    {
        foreach($cats as $row)//循环数组
        {
            $row['deep'] = $pad;

            if($child = get_category($modelname, $row["id"], $pad+1))//如果子级不为空
            {
                $row['child'] = $child;
            }

            $arr[] = $row;
        }

        return $arr;
    }
}

function category_tree($list,$pid=0)
{
    global $temp;

    if(!empty($list))
    {
        foreach($list as $v)
        {
            $temp[] = array("id"=>$v['id'],"deep"=>$v['deep'],"name"=>$v['name'],"pid"=>$v['pid']);
            //echo $v['id'];
            if(array_key_exists("child",$v))
            {
                category_tree($v['child'],$v['pid']);
            }
        }
    }

    return $temp;
}

//递归获取面包屑导航
function get_cat_path($cat,$table='arctype',$type='list')
{
    global $temp;

    $row = \DB::table($table)->select('name','pid','id')->where('id',$cat)->first();

    $temp = '<a href="'.get_front_url(array("catid"=>$row->id,"type"=>$type)).'">'.$row->name."</a> > ".$temp;

    if($row->pid<>0)
    {
        get_cat_path($row->pid, $table, $type);
    }

    return $temp;
}


/**
 * 操作错误跳转的快捷方法
 * @access protected
 * @param string $msg 错误信息
 * @param string $url 页面跳转地址
 * @param mixed $time 当数字时指定跳转时间
 * @return void
 */
function error_jump($msg='', $url='', $time=3)
{
    if ($url=='' && isset($_SERVER["HTTP_REFERER"]))
    {
        $url = $_SERVER["HTTP_REFERER"];
    }

    if(!headers_sent())
    {
        header("Location:".route('admin_jump')."?error=$msg&url=$url&time=$time");
        exit();
    }
    else
    {
        $str = "<meta http-equiv='Refresh' content='URL=".route('admin_jump')."?error=$msg&url=$url&time=$time"."'>";
        exit($str);
    }
}

/**
 * 操作成功跳转的快捷方法
 * @access protected
 * @param string $msg 提示信息
 * @param string $url 页面跳转地址
 * @param mixed $time 当数字时指定跳转时间
 * @return void
 */
function success_jump($msg='', $url='', $time=1)
{
    if ($url=='' && isset($_SERVER["HTTP_REFERER"]))
    {
        $url = $_SERVER["HTTP_REFERER"];
    }

    if(!headers_sent())
    {
        header("Location:".route('admin_jump')."?message=$msg&url=$url&time=$time");
        exit();
    }
    else
    {
        $str = "<meta http-equiv='Refresh' content='URL=".route('admin_jump')."?message=$msg&url=$url&time=$time"."'>";
        exit($str);
    }
}