<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/22
 * Time: 16:20
 */

namespace Cmd;

use GuzzleHttp\Psr7\Request;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddressCommand extends Command
{
    protected function configure()
    {
        $this->setName('user:address')
            ->setDescription('用户登录');
    }
    protected function execute(InputInterface $input, OutputInterface $output){
        if(BBClient::instance()->login('13716526885')){
            $json = <<<ETO
{
  "method": "member.address.list",
  "v": "v1"
}
ETO;


            $request = new Request('POST','topapi',[],$json);
            $response = BBClient::instance()->send($request);
            $response = json_decode($response->getBody()->getContents(),true);
            var_dump($response);
        }

    }
}