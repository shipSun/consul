<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/22
 * Time: 15:54
 */
namespace Cmd;

use Cmd\service\ShopList;
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
        BBClient::instance()->login('13716526885');
        $response = new ShopList(40,3);
        var_dump($response->largeWarehouse());
    }
}