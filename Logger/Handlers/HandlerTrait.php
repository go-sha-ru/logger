<?php

namespace Logger\Handlers;

use Logger\Formatters\LineFormatter;
use Logger\LogLevel;

trait HandlerTrait
{
    protected bool $is_enabled = true;
    protected string $filename = 'default.log';
    protected array $levels;
    protected $formatter;


    public function __construct(array $option = null)
    {
        $this->is_enabled = empty($option['$is_enabled']) ?: $option['$is_enabled'];
        $this->filename = empty($option['filename']) ?: $option['filename'];
        $this->levels = empty($option['levels'])
            ? [LogLevel::LEVEL_ERROR, LogLevel::LEVEL_DEBUG, LogLevel::LEVEL_INFO, LogLevel::LEVEL_NOTICE]
            : $option['levels'];
        $this->formatter = empty($option['formatter'])
            ? new LineFormatter()
            : $option['formatter'];
    }

    public function log($level, $message = '')
    {
        $this->handle($level, $message);
    }

    public function info($message = '')
    {
        $this->log(LogLevel::LEVEL_INFO, $message);
    }

    public function setIsEnabled(bool $value)
    {
        $this->is_enabled = $value;
    }

}