<?php

// autoload_real.php generated by Composer

class ComposerAutoloaderInit7a8d6a110059e3ed94590bfce1d35d5c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    public static function getLoader()
    {
        if (null !== static::$loader) {
            return static::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit7a8d6a110059e3ed94590bfce1d35d5c', 'loadClassLoader'));
        static::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInit7a8d6a110059e3ed94590bfce1d35d5c', 'loadClassLoader'));

        $vendorDir = dirname(__DIR__);
        $baseDir = dirname($vendorDir);

        $map = require __DIR__ . '/autoload_namespaces.php';
        foreach ($map as $namespace => $path) {
            $loader->add($namespace, $path);
        }

        $classMap = require __DIR__ . '/autoload_classmap.php';
        if ($classMap) {
            $loader->addClassMap($classMap);
        }

        $loader->register();

        require $vendorDir . '/swiftmailer/swiftmailer/lib/swift_required.php';
        require $vendorDir . '/kriswallsmith/assetic/src/functions.php';

        return $loader;
    }
}
