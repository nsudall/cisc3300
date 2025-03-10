<?php

namespace app\controllers;

use Exception;
use Error;

class ErrorController {
    public function viewErrors() {
        try {
            $this->noFunction();
            if (true) {
                throw new Exception('error');
            }
        } catch (Error $e) {
            echo ('An error happened!');
        }

    }
}