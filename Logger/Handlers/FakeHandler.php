<?php
namespace Logger\Handlers;

class FakeHandler implements \Logger\Handlers\HandlerInterface
{
    public function handle($level, $message = '')
    {

    }
}