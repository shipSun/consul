<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/24
 * Time: 13:15
 */

namespace Cmd;


use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class SessionStore
{
    public $cache;

    public function __construct()
    {
        $this->cache = new FilesystemAdapter('session',3600,dirname(__DIR__).DIRECTORY_SEPARATOR.'cache');
    }

    public function save($key,$data){
        $item = $this->cache->getItem($key);
        $item->set($data);
        return $this->cache->save($item);
    }
    public function token($key){
        $item = $this->cache->getItem($key);
        if(!$item->get()){
            return null;
        }
        return $item->get()['token'];
    }
}