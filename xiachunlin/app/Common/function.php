<?php
/**
 * Created by PhpStorm.
 * User: daibo
 * Date: 2018/12/5
 * Time: 23:07
 */

// 公共函数文件
if (! function_exists('curl_request'))
{
    function curl_request($api, $params = array(), $method = 'GET', $headers = array())
    {
        $curl = curl_init();

        switch (strtoupper($method))
        {
            case 'GET' :
                if (!empty($params))
                {
                    $api .= (strpos($api, '?') ? '&' : '?') . http_build_query($params);
                }
                curl_setopt($curl, CURLOPT_HTTPGET, TRUE);
                break;
            case 'POST' :
                curl_setopt($curl, CURLOPT_POST, TRUE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
                break;
            case 'PUT' :
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
                break;
            case 'DELETE' :
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
                break;
        }

        curl_setopt($curl, CURLOPT_URL, $api);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_HEADER, 0);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);

        if ($response === FALSE)
        {
            $error = curl_error($curl);
            curl_close($curl);
            return FALSE;
        }
        else
        {
            // 解决windows 服务器 BOM 问题
            $response = trim($response,chr(239).chr(187).chr(191));
            $response = json_decode($response, true);
        }

        curl_close($curl);

        return $response;
    }
}


include_once 'Admin/function.php';
include_once 'Shop/function.php';