<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/22
 * Time: 16:01
 */

namespace Cmd;
use Cmd\service\CreateOrder;
use Cmd\service\Login;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateOrderCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('order:create')
            ->setDescription('创建订单')
            ->addArgument('u',InputArgument::REQUIRED,'手机号')
            ->addArgument('g',InputArgument::REQUIRED,'商品id')
            ->addArgument('a',InputArgument::REQUIRED,'活动id')
            ->addArgument('d',InputArgument::REQUIRED,'配送地址id')
            ->addArgument('s',InputArgument::OPTIONAL,'店铺id',1)
            ->addArgument('z',InputArgument::OPTIONAL,'自取手机号','');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cache = new SessionStore();
        BBClient::instance()->token = $cache->token($input->getArgument('u'));
        if(!BBClient::instance()->token){
            $login = new Login();
            $login->run($input->getArgument('u'));
            BBClient::instance()->token = $cache->token($input->getArgument('u'));
        }
        $order = new CreateOrder($input->getArgument('g'),$input->getArgument('d'),$input->getArgument('s'),$input->getArgument('a'),$input->getArgument('z'));
        $response = $order->run();
        var_dump($response);exit;

    }
}