<?php
namespace Wotu;
class Test{
    public function test(){
        var_dump('composer-test');
        exit;
    }

    public static function getUser($name){
        return $name;
    }
}