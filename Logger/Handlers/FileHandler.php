<?php

namespace Logger\Handlers;

use Logger\Formatters\LineFormatter;
use Logger\LogLevel;

class FileHandler implements \Logger\Handlers\HandlerInterface
{
    use \Logger\Handlers\HandlerTrait;

    public function handle($level, $message = '')
    {
        if ($this->is_enabled && in_array($level, $this->levels)) {
            $logText = $this->formatter->format($level, $message) . PHP_EOL;
            $res = @file_put_contents($this->filename, $logText, FILE_APPEND | LOCK_EX);
            if ($res === false) {
                throw new \RuntimeException("Не могу записать $this->filename");
            }
        }
    }

}
