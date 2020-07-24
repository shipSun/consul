<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/24
 * Time: 11:42
 */

namespace Cmd\service;


use Cmd\BBClient;
use GuzzleHttp\Psr7\Request;

class CreateOrder
{
    protected $goodsId;
    protected $addrId;
    protected $shopId;
    protected $zitiMobile;
    protected $activityId;
    protected $deviceNumber;
    protected $paymentType;
    public function __construct($goodsId,$addrId,$shopId,$activityId,$zitiMobile,$deviceNumer='',$paymentType='online')
    {
        $this->goodsId = $goodsId;
        $this->shopId = $shopId;
        $this->addrId = $addrId;
        $this->zitiMobile = $zitiMobile;
        $this->activityId = $activityId;
        $this->deviceNumber = $deviceNumer;
        $this->paymentType = $paymentType;
    }

    public function run(){
        $json = <<<ETO
{
  "v": "v1",
  "method": "trade.create1499",
  "goods_id": "$this->goodsId",
  "quantity":1,
  "addr_id": "$this->addrId",
  "shop_id": "$this->shopId",
  "dlyType":4,
  "ziti_mobile": "$this->zitiMobile",
  "payment_type": "online",
  "activity_id": "$this->activityId",
  "device_number": "$this->deviceNumber"
}
ETO;
        $request = new Request('POST','topapi',[],$json);
        return BBClient::instance()->send($request);
    }
}