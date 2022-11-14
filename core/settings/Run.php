<?php

namespace boca\console\core\settings;

class Run
{
    protected $command;

    protected $port;

    public function run($port = "8080")
    {

        if (!is_numeric($port)) {

            if (true) {

                die("port error");
            }
        }

        shell_exec("php -S localhost:{$port}");

        return $this;
    }
}