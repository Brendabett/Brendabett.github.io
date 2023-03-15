<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'session_validators' => [
        \Laminas\Session\Validator\RemoteAddr::class,
        \Laminas\Session\Validator\HttpUserAgent::class,
    ],
    'session_config' => [
        'remember_me_seconds' => 604800, // one week
        'use_cookies' => false,
        'cookie_lifetime' => 604800, // one week
        'name' => 'HE3Sere32345DFCVXEatyyu665656tfrgrtegrdfdgfetytyDTGFD2FghdfthrthdgDGRTHdghdghDGHDGHdthrTRY654676746d756dfGDFghr5YTsDghd5yd',
    ],
      'session_storage' => [
        'type' => \Laminas\Session\Storage\SessionArrayStorage::class,
    ],
    'db' => array(
        'driver'    => 'PdoMysql',
        'hostname'  => 'localhost',
        'database'  => 'ict_mgt',
        'username'  => 'root',
        'password'  => 'chapati',
    ),
    'service_manager' => array(
        'factories' => array(
            'Laminas\Db\Adapter\Adapter' => 'Laminas\Db\Adapter\AdapterServiceFactory',
        ),
    ),
);
