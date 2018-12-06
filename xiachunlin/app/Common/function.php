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