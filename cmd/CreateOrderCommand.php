<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/22
 * Time: 16:01
 */

namespace Cmd;
use Cmd\service\CreateOrder;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateOrderCommand extends Command
{
    protected function configure()
    {
        $this
            // 命令的名称 （"php console_command" 后面的部分）
            ->setName('order:create')
            // 运行 "php console_command list" 时的简短描述
            ->setDescription('活动店铺列表');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if(BBClient::instance()->login('13716526885')){
            $order = new CreateOrder(66257,1089,1,77,'1484644546');
            $response = $order->run();
            var_dump($response);exit;
            $json = <<<ETO
{
  "v": "v1",
  "method": "trade.create1499",
  "goods_id":66257,
  "quantity":1,
  "addr_id":1089,
  "shop_id":1,
  "dlyType":4,
  "ziti_mobile":"14846464546",
  "payment_type": "online",
  "activity_id":77,
  "device_number":"abc"
}
ETO;
            $request = new Request('POST','topapi',[],$json);
            $response = BBClient::instance()->send($request);
            var_dump(json_decode($response->getBody()->getContents(),true));
        }

    }
}