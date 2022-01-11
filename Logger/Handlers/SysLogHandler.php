<?php

namespace Logger\Handlers;

use HandlerTrait;
use Logger\LogLevel;

class SysLogHandler implements HandlerInterface
{
    use HandlerTrait;

    public function handle($level, $message = '')
    {
        if ($this->is_enabled && in_array($level, $this->levels)) {
            openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_LOCAL0);
            $logText = $this->formatter->format($level, $message) . PHP_EOL;
            syslog(LogLevel::SYSLOG_CODE[$level], $logText);
            closelog();
        }
    }
}