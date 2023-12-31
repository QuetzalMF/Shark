<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd95d9eefab3ce12c25d74552ff3fd12c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitd95d9eefab3ce12c25d74552ff3fd12c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd95d9eefab3ce12c25d74552ff3fd12c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd95d9eefab3ce12c25d74552ff3fd12c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
