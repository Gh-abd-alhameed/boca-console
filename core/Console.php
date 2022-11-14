<?php

namespace boca\console\core;

use boca\console\core\settings\Run;
use boca\console\core\settings\Create;

class Console
{
    private $Run;

    private $Create;

    private $argc;

    private $argv;

    private $fail = true;

    public function Init($argc, $argv)
    {
        $this->Run = new Run;
        $this->Create = new Create;
        $this->argc = $argc;
        $this->argv = $argv;

        return $this;
    }

    public function run($port = "8080")
    {
        $this->Run->run($port);
    }

    public function Create($file, $nameFile)
    {
        return $this->Create->{$file}($nameFile);
    }


    public function hundle($argc, $argv)
    {
        if ($argc == 2 && $argv[1] == "run") {
            $this->fail = false;
            $this->run();
            return "";
        }

        if ($argc == 3 && preg_match("/--port=[0-9]{2,4}/", $argv[2], $mach)) {
            $port = explode("=", $mach[0]);
            $port = end($port);
            $this->fail = false;
            $this->run($port);
            return "";
        }

        if ($argc == 3 && preg_match("/make:[a-z]+/", $argv[1], $mach)) {
            $fileType = str_replace("make:", "", $mach[0]);
            $fileName = end($argv);
            $this->fail = false;
            $this->Create($fileType, $fileName);
            return "";
        }
        return "";
    }

    public function Command($command = "")
    {
        if (is_string($command) && !empty($command)) {
            $command = preg_replace("/^php /", "", $command);
            $argv = explode(" ", $command);
            $argc = count($argv);
            $this->Init($argc, $argv)->excute();
            return "";
        }
        return "error command";
    }

    public function excute()
    {

        $this->hundle($this->argc, $this->argv);
        if ($this->fail) {
            echo "Command error";
        }
    }
}
