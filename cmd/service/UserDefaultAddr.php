<?php
namespace Cmd\service;

use Cmd\BBClient;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/24
 * Time: 10:40
 */

class UserDefaultAddr
{
    public function default(){
        $json = <<<ETO
{
  "method": "member.address.list",
  "v": "v1"
}
ETO;
        $request = new Request('POST','topapi',[],$json);
        $response = BBClient::instance()->send($request);
        $response = json_decode($response->getBody()->getContents(),true);
        var_dump($response);
    }
}