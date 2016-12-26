<?php

namespace App;

class Config {

    private $settings = [];
    public function __construct() {
        $this->settings = require direname(__DIR__) . '/config/config.php';
    }
}

?>