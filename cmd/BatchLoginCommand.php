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
use Symfony\Component\Yaml\Yaml;

class BatchLoginCommand extends Command
{
    protected function configure()
    {
        $this->setName('user:login-batch')
            // 配置一个参数
            ->setDescription('用户登录');
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        try{
            $activity = Yaml::parseFile(dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'activity.yml');
            foreach($activity['phone'] as $phone){
                $login = new Login();
                if($login->run($phone)){
                    $output->write($phone.':登录成功');
                }
            }

        }catch (\RuntimeException $e){
            $output->write($e->getMessage(),$e->getCode());
        }

    }
}