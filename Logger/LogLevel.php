<?php

namespace Logger;


class LogLevel
{
    const LEVEL_ERROR = 'ERROR';
    const LEVEL_INFO = 'INFO';
    const LEVEL_DEBUG = 'DEBUG';
    const LEVEL_NOTICE = 'NOTICE';

    const LEVELS_CODE = [
        self::LEVEL_ERROR => '001',
        self::LEVEL_INFO => '002',
        self::LEVEL_DEBUG => '003',
        self::LEVEL_NOTICE => '004',
    ];

    const SYSLOG_CODE = [
        self::LEVEL_ERROR => 3,
        self::LEVEL_INFO => 6,
        self::LEVEL_DEBUG => 7,
        self::LEVEL_NOTICE => 5,
    ];
}