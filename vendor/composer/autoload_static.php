<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit55cb9f157d7f0e421b79d3e5ca91d9f1
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'NevaApp\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'NevaApp\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit55cb9f157d7f0e421b79d3e5ca91d9f1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit55cb9f157d7f0e421b79d3e5ca91d9f1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}