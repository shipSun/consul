<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/22
 * Time: 10:19
 */

namespace Cmd;

use GuzzleHttp\Client;

class BBClient extends Client
{
    public $domain = 'https://o2otest.yesmywine.com/';

    public $token;

    static protected $instance;

    public function __construct()
    {
        $config['headers'] = $this->initHeader();
        $config['base_uri']= $this->domain;
        $config['verify'] = false;
        parent::__construct($config);
    }
    protected function initHeader(){
        $headers['Accept'] = 'text/plain, text/html,application/json';
        $headers['Accept-Encoding'] = 'gzip, deflate, br';
        $headers['Accept-Language'] = 'zh-CN,zh;q=0.9';
        $headers['Connection'] = 'keep-alive';
        $headers['Origin'] = 'https://m.o2o.yesmywine.com';
        $headers['Referer'] = 'https://m.o2o.yesmywine.com/maotai-active/goodsInfo/79068/3';
        $headers['Content-Type'] = 'application/json';
        $headers['User-Agent'] = "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 SE 2.X MetaSr 1.0";
        return $headers;
    }

    /**
     * @return Client
     */
    static public function instance(){
        if(!static::$instance){
            static::$instance = new static();
        }
        return static::$instance;
    }
}