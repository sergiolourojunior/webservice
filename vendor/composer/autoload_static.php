<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit825566457cab475fb16625d7df9c868c
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit825566457cab475fb16625d7df9c868c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit825566457cab475fb16625d7df9c868c::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit825566457cab475fb16625d7df9c868c::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
