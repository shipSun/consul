<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/24
 * Time: 17:04
 */

namespace Cmd\service;


use Cmd\PROClient;
use GuzzleHttp\Psr7\Request;

class Subscribe
{
    protected $activityId;
    protected $goodsId;

    public function __construct($activityId,$goodsId)
    {
        $this->activityId = $activityId;
        $this->goodsId = $goodsId;
    }
    public function run(){
        $request = new Request('POST','promotion/subscribe/run',[],'activity_id='.$this->activityId.'&goods_id='.$this->goodsId);
        return PROClient::instance()->send($request);
    }
}