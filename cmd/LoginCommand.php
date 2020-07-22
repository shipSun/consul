<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/22
 * Time: 6:23
 */

namespace Cmd;

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
            ->addArgument('name', InputArgument::REQUIRED, '账户')
            ->setDescription('用户登录');
    }
    protected function interact(InputInterface $input, OutputInterface $output)
    {
        $fd = STDIN;
        var_dump(fgets($fd));
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        try{
            var_dump($input->getArgument('name'));
            if(BBClient::instance()->login('13716526885')){
                $output->write('登录成功');
            }
        }catch (\RuntimeException $e){
            $output->write($e->getMessage(),$e->getCode());
        }

    }
}