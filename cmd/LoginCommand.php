<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/22
 * Time: 6:23
 */

namespace Cmd;

use GuzzleHttp\Psr7\Request;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LoginCommand extends Command
{
    protected function configure()
    {
        $this->setName('user:login')
            ->setDescription('用户登录');
    }
    protected function execute(InputInterface $input, OutputInterface $output){
        $request = new Request('POST','topapi',[],'{"account":"13716526885","vcode":null,"sms_code":"88888888","origin":1,"tag_type":null,"format":"json","v":"v1","method":"user.vue.login"}');
        $response = BBClient::instance()->send($request);
        $response = json_decode($response->getBody()->getContents(),true);
        var_dump($response);
    }
}