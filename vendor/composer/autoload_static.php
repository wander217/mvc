<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite1ec84d836f6ea3b79d53698f33c0c03
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MVC\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MVC\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite1ec84d836f6ea3b79d53698f33c0c03::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite1ec84d836f6ea3b79d53698f33c0c03::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite1ec84d836f6ea3b79d53698f33c0c03::$classMap;

        }, null, ClassLoader::class);
    }
}