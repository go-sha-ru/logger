<?php
namespace Logger;

use Logger\Handlers\FileHandler;
use Logger\Handlers\HandlerInterface;

class Logger
{
    protected $handlers;

    public function log($level, $message = '')
    {

        $handlers = $this->getHandlers();
        if (empty($handlers)) {
            $handlers[] = new FileHandler();
        }

        foreach ($handlers as $handler) {
            $handler->handle($level, $message);
        }
    }

    public function error($message = '')
    {
        $this->log(LogLevel::LEVEL_ERROR, $message);
    }

    public function info($message = '')
    {
        $this->log(LogLevel::LEVEL_INFO, $message);
    }

    public function debug($message = '')
    {
        $this->log(LogLevel::LEVEL_DEBUG, $message);
    }

    public function notice($message = '')
    {
        $this->log(LogLevel::LEVEL_NOTICE, $message);
    }

    public function addHandler(HandlerInterface $handler)
    {
        $this->handlers[] = $handler;

    }

    private function getHandlers()
    {
        return $this->handlers;
    }
}