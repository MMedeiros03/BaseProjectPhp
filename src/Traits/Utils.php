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

    function getNameAllClass()
    {
        $folder = getcwd() . '/src/Entity/';
        $class_names = [];
        $namespaces = [];

        // Get an array of all the PHP files in the folder
        $files =  glob($folder . '/*.php', GLOB_BRACE);

        // Iterate over the array of files
        foreach ($files as $file) {
            // Read the contents of the file
            $contents = file_get_contents($file);

            // Use a regular expression to extract the class names from the file contents
            preg_match_all('/class\s+(\w+)/', $contents, $classname); 

            // Add the class names to the array
            $class_names = array_merge($class_names, $classname[1]);

            // $namespaces[] = 
        }

        return $values = [
            "names" => $class_names,
            "namespaces" =>$namespaces
        ];
    }
}
