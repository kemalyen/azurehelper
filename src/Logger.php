<?php
namespace Gazatem\Phpfunc;

class Logger {

    private $messages = [];
    
    public function getMessages()
    {
        $return = [];
        foreach($this->messages as $message){
            $return[] = $message[0] .': '. $message[1];
        }
        return $return;
    }

    function information(string $message) {
        array_push($this->messages, $message);
    }

    public function emergency($message, array $context = array()){
        array_push($this->messages, ['emergency', $message]);
    }

    public function alert($message, array $context = array()){
        array_push($this->messages, ['alert', $message]);
    }
    
    public function critical($message, array $context = array()){
        array_push($this->messages, ['critical', $message]);
    }

    public function error($message, array $context = array()){
        array_push($this->messages, ['error', $message]);
    }

    public function warning($message, array $context = array()){
        array_push($this->messages, ['warning', $message]);
    }

    public function notice($message, array $context = array()){
        array_push($this->messages, ['notice', $message]);
    }   
    
    public function info($message, array $context = array()){
        array_push($this->messages, ['info', $message]);
    }       

    public function debug($message, array $context = array()){
        array_push($this->messages, ['debug', $message]);
    }     
    
    public function log($message, array $context = array()){
        array_push($this->messages, ['log', $message]);
    }       
}