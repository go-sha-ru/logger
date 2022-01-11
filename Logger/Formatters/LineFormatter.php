<?php


namespace Logger\Formatters;


use Logger\LogLevel;

class LineFormatter
{

    public const DEFAULT_MESSAGE_FORMAT = "%date%  %level_code%  %level%  %message%";

    public const DEFAULT_DATE_FORMAT = "Y-m-d H:i:s";

    protected string $messageFormat;
    protected string $dateFormat;

    public function __construct(?string $messageFormat = null, ?string $dateFormat = null)
    {
        $this->messageFormat = $messageFormat === null ? static::DEFAULT_MESSAGE_FORMAT : $messageFormat;
        $this->dateFormat = $dateFormat === null ? static::DEFAULT_DATE_FORMAT : $dateFormat;
    }

    public function format($level, $message): string
    {
        $ret = $this->messageFormat;
        $replace = [
            '%date%' => date($this->dateFormat),
            '%level_code%' => LogLevel::LEVELS_CODE[$level],
            '%level%' => $level,
            '%message%' => $message,
        ];

        return strtr($ret, $replace);
    }
}