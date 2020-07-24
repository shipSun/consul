<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/24
 * Time: 11:02
 */

namespace Cmd\service;


use Cmd\BBClient;
use GuzzleHttp\Psr7\Request;

class ActivityGoodInfo
{
    protected $goodsId;
    protected $activityId;
    protected $shopId;
    protected $num;
    public function __construct($goodsId,$activityId,$shopId,$num=1)
    {
        $this->goodsId = $goodsId;
        $this->activityId = $activityId;
        $this->shopId = $shopId;
        $this->num = $num;
    }

    public function info(){
        $json = <<<ETO
{
  "method": "goods.detail",
  "activity_id": "$this->activityId",
  "goods_id":"$this->goodsId",
  "shop_id":"$this->activityId",
  "goods_number":"$this->num",
  "v": "v1"
}
ETO;
        $request = new Request('POST','topapi',[],$json);
        return BBClient::instance()->send($request);
    }
}