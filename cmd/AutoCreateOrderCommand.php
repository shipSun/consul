<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/24
 * Time: 15:09
 */

namespace Cmd;


use Cmd\service\CreateOrder;
use Cmd\service\ShopList;
use Cmd\service\UserDefaultAddr;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

class AutoCreateOrderCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('order:autocreate')
            ->setDescription('创建订单');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $activity = Yaml::parseFile(dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'activity.yml');
        foreach($activity['phone'] as $phone){
            $cache = new SessionStore();
            BBClient::instance()->token = $cache->token($phone);
            if(!BBClient::instance()->token){
                continue;
            }
            $shop = (new ShopList($activity['activityId'],$activity['goodsId']))->largeWarehouse();
            if(!$shop){
                continue;
            }
            $shopId = $shop['shop_id'];
            $addr = (new UserDefaultAddr())->default();
            if(!$addr){
                continue;
            }
            $addrId = $addr['addr_id'];

            $order = new CreateOrder($activity['activityId'],$addrId,$shopId,$activity['goodsId'],$phone);
            $response = $order->run();
            var_dump($response);exit;
        }
    }
}