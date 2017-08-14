<?php

namespace App;

use Session;

class Alert 
{
    private $data = null;
    
    const TYPE_ERROR = 'danger', 
        TYPE_SUCCES = 'success';
    
    static function setType($type) {
        Session::put("alert", self::getData() +  ['type' => $type]);
    }
    
    static function setTitle($title) {
        Session::put("alert", self::getData() + ['title' => $title]);
    }
    
    static function setText($text) {
        Session::put("alert", self::getData() + ['text' => $text]);
    }
    
    static function getData() {
        $data = Session::get("alert");
        if(is_array($data))
            return $data;
        else {
            return [];
        }
    }
    
    static function reset() {
        Session::put("alert", []);
    }
}
