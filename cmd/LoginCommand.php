<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/22
 * Time: 6:23
 */

namespace Cmd;

use Cmd\service\Login;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LoginCommand extends Command
{
    protected function configure()
    {
        $this->setName('user:login')
            // 配置一个参数
            ->addArgument('phone', InputArgument::REQUIRED, '账户')
            ->setDescription('用户登录');
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        try{
            $login = new Login();
            if($login->run($input->getArgument('phone'))){
                $output->write('登录成功');
            }
        }catch (\RuntimeException $e){
            $output->write($e->getMessage(),$e->getCode());
        }

    }
}