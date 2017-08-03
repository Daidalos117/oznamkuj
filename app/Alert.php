<?php

namespace App;

use Session;

class Alert 
{
    private $data = null;
    
    const TYPE_ERROR = 'danger', 
        TYPE_SUCCES = 'succes';
    
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
        if(is_array(Session::get("alert")))
            return Session::get("alert");
        else {
            return [];
        }
    }
}
