<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/22
 * Time: 11:46
 */

namespace Cmd;


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
            $json = <<<ETO
{
  "method": "goods.detail",
  "activity_id": 53,
  "goods_id":67217,
  "shop_id":"1",
  "goods_number":2,
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