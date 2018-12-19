<?php

namespace App\Http\Middleware;

use Closure;
use App\Common\ReturnData;
use App\Common\Token;
class TokenAuth
{
    /**
     * Token验证
     * token可以在header里面传递【Token】，也可以在参数里面传【token】，注意区分大小写
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('AccessToken','') ?: $request->input('access_token','');

        if ($token == '')
        {
            dd(ReturnData::create(ReturnData::FORBIDDEN,[],'没有token'));
        }

        if (!Token::checkToken($token))
        {
            dd(ReturnData::create(ReturnData::TOKEN_ERROR,[],'token错误'));
        }

        return $next($request);
    }
}
