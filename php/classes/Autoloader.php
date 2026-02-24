<?php
namespace App;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($sClassName)
    {
        $sFile = str_replace(__NAMESPACE__ . '\\', '', $sClassName);
        $sFile = str_replace('\\', '/', $sFile);
        $sFile = __DIR__ . '/' . $sFile . '.php';
        if (file_exists($sFile)) {
            require_once $sFile;
        }
    }
}
