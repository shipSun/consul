<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/7/24
 * Time: 23:15
 */

namespace Cmd;


class Yaml extends \Symfony\Component\Yaml\Yaml
{
    public static function parseFile(string $filename, int $flags = 0){
        $param = self::parseFile($filename, $flags);

    }
    protected function parseEnv($string){

    }
}