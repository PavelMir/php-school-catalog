<?php

namespace App\Logger;

class Logger implements LoggerInterface
{
    public function log($level, $message)
    {
        $fp = fopen($this->getFileName(), 'a');
        fwrite($fp, $this->generateLogMessage($level, $message));
        fclose($fp);
    }
    
    private function generateLogMessage($level, $message)
    {
        $timePart = date('Y-m-d H:m:i');
        $formattedMessage = sprintf(
            '[%s] Level:%s. Message: %s' . PHP_EOL,
            $timePart,
            $level,
            $message
        );
        return $formattedMessage;
    }
    
    private function getFileName()
    {
        $Filename = date('Y_m_d_H') . '.log';
        $path = '../logs/'. $Filename;
        return $path;
    }
}