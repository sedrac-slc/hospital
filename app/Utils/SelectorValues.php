<?php

namespace App\Utils;

class SelectorValues{
    private $name;
    private $url;
    private $options;

    function __construct($url, $name, $options){
        $this->url = $url;
        $this->name = $name;
        $this->options = $options;
    }

    function __get($name){
        return $this->$name;
    }

    function __set($name, $value){
        $this->$name = $value;
    }

}
