<?php

namespace App\Utils;

class SelectorValues{
    private $name;
    private $options;

    function __construct($name, $options){
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
