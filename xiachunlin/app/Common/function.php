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