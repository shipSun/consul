<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/22
 * Time: 10:19
 */

namespace Cmd;

use GuzzleHttp\Client;
use function GuzzleHttp\Psr7\stream_for;
use Psr\Http\Message\RequestInterface;


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
     * @return self
     */
    static public function instance(){
        if(!static::$instance){
            static::$instance = new static();
        }
        return static::$instance;
    }
    protected function initRequest(RequestInterface $request){
        switch ($request->getMethod()){
            case "POST":
                return $this->initPost($request);
            case "GET":
                return $this->initGet($request);
        }
    }
    protected function initPost(RequestInterface $request){
        $json = json_decode($request->getBody()->getContents(),true);
        if($json){
            $json = json_encode(array_merge($json,$this->globalParam()));
            return $request->withBody(stream_for($json));
        }
    }
    protected function initGet(RequestInterface $request){
        parse_str($request->getUri()->getQuery(), $query);
        $query = array_merge($query,$this->globalParam());
        $uri = http_build_query($query);
        vaar_dump($uri);exit;
    }
    protected function globalParam(){
        $data['format'] = 'json';
        if($this->token){
            $data['accessToken'] = $this->token;
        }
        return $data;
    }

    public function send(RequestInterface $request, array $options = [])
    {
        $response = parent::send($this->initRequest($request), $options); // TODO: Change the autogenerated stub
        $response = json_decode($response->getBody()->getContents(),true);
        if($response['errorcode']!=0){
            throw new \RuntimeException($response['msg'], $response['errorcode']);
        }
        return $response['data'];
    }
}