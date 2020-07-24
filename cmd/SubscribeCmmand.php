<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/24
 * Time: 17:15
 */

namespace Cmd;

use Cmd\service\Login;
use Cmd\service\Subscribe;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SubscribeCmmand extends Command
{
    protected function configure()
    {
        $this->setName('user:subscribe')
            // 配置一个参数
            ->addArgument('u', InputArgument::REQUIRED, '帐户')
            ->addArgument('a', InputArgument::REQUIRED, '活动id')
            ->addArgument('g', InputArgument::REQUIRED, '商品id')
            ->setDescription('用户预约');
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $cache = new SessionStore();
        PROClient::instance()->token = $cache->token($input->getArgument('u'));
        if(!PROClient::instance()->token){
            $login = new Login();
            $login->run($input->getArgument('u'));
            PROClient::instance()->token = $cache->token($input->getArgument('u'));
        }
        $subscribe = new Subscribe($input->getArgument('a'),$input->getArgument('g'));
        $msg = $subscribe->run();
        $output->write($input->getArgument('u').':'.$msg);
    }
}