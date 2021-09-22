<?php
namespace Gazatem\Phpfunc;

class FunctionContext {
        public $request;
        public $outputs;
        public $log;

        public function __construct() {
            $this->log = new Logger();
            $this->outputs = [ '_none_' => null ];
        }
    }