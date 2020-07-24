<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/24
 * Time: 11:07
 */

namespace Cmd\service;


use Cmd\BBClient;
use GuzzleHttp\Psr7\Request;

class ShopList
{
    protected $activityId;
    protected $goodsId;

    public function __construct($activityId,$goodsId)
    {
        $this->activityId = $activityId;
        $this->goodsId = $goodsId;
    }

    public function largeWarehouse(){
        $shop ='';
        foreach($this->shop() as $val){
            if($val['shop_id']==1){
                $shop = $val;
                break;
            }
        }
        return $shop;
    }
    protected function shop(){
        $json = <<<ETO
{
  "method": "rush.purchase.shop.list",
  "activity_id": $this->activityId,
  "goods_id":$this->goodsId,
  "latLng":"39.866190,116.373740",
  "v": "v1"
}
ETO;
        $request = new Request('POST','topapi',[],$json);
        return BBClient::instance()->send($request);
    }
}