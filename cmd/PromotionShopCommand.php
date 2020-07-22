<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/22
 * Time: 15:54
 */
namespace Cmd;

use GuzzleHttp\Psr7\Request;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PromotionShopCommand extends Command
{
    protected function configure()
    {
        $this
            // 命令的名称 （"php console_command" 后面的部分）
            ->setName('promotion:shop')
            // 运行 "php console_command list" 时的简短描述
            ->setDescription('活动店铺列表');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $json = <<<ETO
{
  "method": "rush.purchase.shop.list",
  "activity_id": 40,
  "goods_id":3,
  "latLng":"39.866190,116.373740",
  "v": "v1"
}
ETO;
        $request = new Request('POST','topapi',[],$json);
    $response = BBClient::instance()->send($request);
    var_dump(json_decode($response->getBody()->getContents(),true));
    }
}