<?php
namespace Logger\Handlers;

interface HandlerInterface
{
    public function handle($level, $message = '');
}