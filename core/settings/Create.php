<?php

namespace boca\console\core\settings;

class Create
{
    public function __construct()
    {
    }
    public function controller($nameFile)
    {

        $controllerFile = file_get_contents(__DIR__ . "/filecreate/controller");
        $fileContent = str_replace(array("/", "*"), "",  $controllerFile);
        $fileContent = str_replace("controllername", $nameFile,  $controllerFile);

        if (file_exists(DIR_ROOT . "/{$nameFile}.php")) {

            echo "file exists";

            return;
        }

        file_put_contents(DIR_ROOT . "/{$nameFile}.php",  $fileContent);

        echo "done create $nameFile " . DIR_ROOT . "/$nameFile";
    }
    public function model($nameFile)
    {

        $modelrFile = file_get_contents(__DIR__ . "/filecreate/model");
        $fileContent =  str_replace(array("#"), "",  $modelrFile);

        $fileContent = str_replace("modelname", $nameFile,  $modelrFile);

        if (file_exists(DIR_ROOT . "/{$nameFile}.php")) {

            echo "file exists";

            return;
        }

        file_put_contents(DIR_ROOT . "/{$nameFile}.php",  $fileContent);

        echo "done create $nameFile " . DIR_ROOT . "/$nameFile";
    }
}