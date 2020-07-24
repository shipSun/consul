<?php
namespace Cmd\service;

use Cmd\BBClient;
use GuzzleHttp\Psr7\Request;

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
        $addr = '';
        foreach($response['list'] as $val){
            if($val['def_addr']==1){
                $addr = $val;
                break;
            }
        }

        if(!$addr && count($response['list'])>0){
            $addr = array_shift($response['list']);
        }
        if(!$addr){
            throw new \RuntimeException('没有添加邮寄地址');
        }
        return $addr;
    }
}