<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit24fa447d9c4dd8eb50f0bfdaaf35c79c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpOffice\\PhpWord\\' => 18,
            'PhpOffice\\Math\\' => 15,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpOffice\\PhpWord\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/phpword/src/PhpWord',
        ),
        'PhpOffice\\Math\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/math/src/Math',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit24fa447d9c4dd8eb50f0bfdaaf35c79c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit24fa447d9c4dd8eb50f0bfdaaf35c79c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit24fa447d9c4dd8eb50f0bfdaaf35c79c::$classMap;

        }, null, ClassLoader::class);
    }
}
