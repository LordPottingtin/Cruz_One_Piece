<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdd0e8a2a81c34022cc06c2a65c22e4d9
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdd0e8a2a81c34022cc06c2a65c22e4d9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdd0e8a2a81c34022cc06c2a65c22e4d9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdd0e8a2a81c34022cc06c2a65c22e4d9::$classMap;

        }, null, ClassLoader::class);
    }
}
