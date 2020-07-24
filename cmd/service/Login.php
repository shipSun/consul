<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/24
 * Time: 13:28
 */

namespace Cmd\service;


use Cmd\BBClient;
use Cmd\SessionStore;
use GuzzleHttp\Psr7\Request;

class Login
{
    public function run($account){
        $request = new Request('POST','topapi',[],'{"account":"'.$account.'","vcode":null,"sms_code":"88888888","origin":1,"tag_type":null,"v":"v1","method":"user.vue.login"}');
        $response = BBClient::instance()->send($request);
        $cache = new SessionStore();
        return $cache->save($account, ['token'=>$response['accessToken']]);
    }
}