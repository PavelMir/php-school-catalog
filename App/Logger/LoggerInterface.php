<?php

namespace App\Logger;

interface LoggerInterface
{
    public function log($level, $message);
}