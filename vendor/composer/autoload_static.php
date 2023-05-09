<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit820eb1400def58dff611677d25757305
{
    public static $prefixLengthsPsr4 = array (
        'v' => 
        array (
            'view\\' => 5,
        ),
        's' => 
        array (
            'src\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'view\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit820eb1400def58dff611677d25757305::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit820eb1400def58dff611677d25757305::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit820eb1400def58dff611677d25757305::$classMap;

        }, null, ClassLoader::class);
    }
}