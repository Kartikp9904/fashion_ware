<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit205393e8d6e0972af1f8f8a6f5905a87
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit205393e8d6e0972af1f8f8a6f5905a87::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit205393e8d6e0972af1f8f8a6f5905a87::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit205393e8d6e0972af1f8f8a6f5905a87::$classMap;

        }, null, ClassLoader::class);
    }
}
