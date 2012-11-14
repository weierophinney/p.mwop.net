<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

$mongoServer = getenv('OPENSHIFT_NOSQL_DB_URL')
             ? getenv('OPENSHIFT_NOSQL_DB_URL')
             : 'mongodb://localhost:27017';
$sqliteDbDir = getenv('OPENSHIFT_DATA_DIR')
             ? getenv('OPENSHIFT_DATA_DIR')
             : realpath(getcwd() . '/data');

return array(
    'db' => array(
        'driver'   => 'Pdo_Sqlite',
        'database' => $sqliteDbDir . '/users.db',
    ),
    'phly_paste' => array(
        'captcha' => array(
        ),
    ),
    'mongo' => array(
        'connection' => array(
            'server' => $mongoServer,
            'options' => array(
                'connect'  => true,
            ),
        ),
        'db' => array(
            'cxn'  => 'Paste\Mongo',
            'name' => 'paste',
        ),
        'paste_collection' => array(
            'db'   => 'Paste\MongoDb',
            'name' => 'pastes',
        ),
    ),
    'service_manager' => array(
        'aliases' => array(
            'PhlyPaste\PasteService' => 'PhlyPaste\MongoService',
            'PhlyPaste\AuthService'  => 'zfcuser_auth_service',
        ),
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
    'router' => array('routes' => array(
        'phly-paste' => array(
            'options' => array(
                'route' => '/',
            ),
        ),
    )),
);
