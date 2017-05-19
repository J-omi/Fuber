<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit772984e9ac32078624b11be76a9bf280
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'apimatic\\jsonmapper\\' => 20,
        ),
        'R' => 
        array (
            'RecipeFoodNutritionLib\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'apimatic\\jsonmapper\\' => 
        array (
            0 => __DIR__ . '/..' . '/apimatic/jsonmapper/src',
        ),
        'RecipeFoodNutritionLib\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'Unirest\\' => 
            array (
                0 => __DIR__ . '/..' . '/mashape/unirest-php/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit772984e9ac32078624b11be76a9bf280::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit772984e9ac32078624b11be76a9bf280::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit772984e9ac32078624b11be76a9bf280::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
