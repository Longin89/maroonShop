<?php

namespace Core;

use Error;

class Application
{
    public function __construct()
    {
        $this->_set_reporting();
    }

    private function _set_reporting()
    {
        if (DEBUG) {
            error_reporting(E_ERROR);
            ini_set('display_errors', 1);
        } else {
            error_reporting(0);
            ini_set('display_errors', 0);
            ini_set('log_errors', 1);
            ini_set('error.log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'errors.log');
        }
    }
}
