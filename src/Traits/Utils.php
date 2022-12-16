<?php

namespace Nbwdigital\BaseProject\Traits;

date_default_timezone_set('America/Sao_Paulo');

trait Utils
{
    function writeToLog($data, $title = ''): void
    {
        if (!file_exists(getcwd() . "/logs")) {
            mkdir(getcwd() . "/logs", 0777, true);
        }

        $log = date("Y.m.d h:i:s") . " | ";
        $log .= (strlen($title) > 0 ? $title : 'DEBUG') . " | ";
        $log .= print_r($data, 1) . "\n";

        if ($fp = fopen(getcwd() . "/logs/insert_time_work.log", "a+")) {
            fwrite($fp, $log);
            fclose($fp);
        }
    }
}
