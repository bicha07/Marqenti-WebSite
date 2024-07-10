<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8744fc635bac09f8831ffa55e80f863b
{
    public static $files = array (
        'd3201f8686507d44345b55f0c4826fde' => __DIR__ . '/../..' . '/Inc/utils.php',
        '0c3ba61ab0c9ca2f7ffea9ce4f71a7ce' => __DIR__ . '/../..' . '/Inc/base-data.php',
        '5645a41fe5490392769c0b61e80911ad' => __DIR__ . '/../..' . '/Inc/base-model.php',
        '92e6fe00a9019a15986f66d77d9c0fe4' => __DIR__ . '/../..' . '/Inc/functions.php',
        'b3db986c6e4ba4a970cfea0687e72b4a' => __DIR__ . '/../..' . '/Inc/Admin/AdminSettings.php',
        'ca167cab93ff3cf6fc874acdbd9b748e' => __DIR__ . '/../..' . '/Inc/Modules/NotificationBar/Inc/add-sections.php',
        '2b8b4231b9882a18a3129cf1965dc77c' => __DIR__ . '/../..' . '/Inc/Modules/LoginCustomizer/Inc/add-sections.php',
        'a91098cfdcbdbd8da19916d7128d1585' => __DIR__ . '/../..' . '/Inc/Modules/AdminColumns/AdminColumnsData.php',
        'b80a3f2556466ffcb988444a89b6f4c8' => __DIR__ . '/../..' . '/Libs/adminify-framework/adminify-framework.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WPAdminify\\Pro\\' => 15,
            'WPAdminify\\Libs\\' => 16,
            'WPAdminify\\Inc\\Modules\\' => 23,
            'WPAdminify\\Inc\\DashboardWidgets\\' => 32,
            'WPAdminify\\Inc\\Classes\\' => 23,
            'WPAdminify\\Inc\\Admin\\' => 21,
            'WPAdminify\\Inc\\' => 15,
            'WPAdminify\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WPAdminify\\Pro\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Pro',
        ),
        'WPAdminify\\Libs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Libs',
        ),
        'WPAdminify\\Inc\\Modules\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Inc/Modules',
        ),
        'WPAdminify\\Inc\\DashboardWidgets\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Inc/dashboard-widgets',
        ),
        'WPAdminify\\Inc\\Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Inc/classes',
        ),
        'WPAdminify\\Inc\\Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Inc/Admin',
        ),
        'WPAdminify\\Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Inc',
        ),
        'WPAdminify\\' => 
        array (
            0 => __DIR__ . '/../..' . '/adminify',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8744fc635bac09f8831ffa55e80f863b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8744fc635bac09f8831ffa55e80f863b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8744fc635bac09f8831ffa55e80f863b::$classMap;

        }, null, ClassLoader::class);
    }
}