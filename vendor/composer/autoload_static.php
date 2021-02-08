<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite8011d9820bc08fb53a3b871b9c9a584
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite8011d9820bc08fb53a3b871b9c9a584::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite8011d9820bc08fb53a3b871b9c9a584::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite8011d9820bc08fb53a3b871b9c9a584::$classMap;

        }, null, ClassLoader::class);
    }
}
