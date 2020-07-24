<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/22
 * Time: 11:46
 */

namespace Cmd;


use Cmd\service\ActivityGoodInfo;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GoodsInfoCommand extends Command
{
    protected function configure()
    {
        $this->setName('goods:info')
            ->setDescription('用户登录');
    }
    protected function execute(InputInterface $input, OutputInterface $output){
        if(BBClient::instance()->login('13716526885')){
            $response = new ActivityGoodInfo(67217,53,1);
            $response = $response->info();
            var_dump($response);exit;
        }

    }
}