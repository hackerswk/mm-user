<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3da5c379c404b5089c734eb1bc0735ff
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stanleysie\\MmUser\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stanleysie\\MmUser\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit3da5c379c404b5089c734eb1bc0735ff::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3da5c379c404b5089c734eb1bc0735ff::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3da5c379c404b5089c734eb1bc0735ff::$classMap;

        }, null, ClassLoader::class);
    }
}