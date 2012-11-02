<?php
$configGlobPaths = array(
    'config/autoload/{,*.}{global,local}.php',
);
$localPath = __DIR__ . '/../../data';
if (file_exists($localPath) && is_dir($localPath)) {
    $configGlobPaths[] = $localPath . '/{,*.}local.php';
}
return array(
    'modules' => array(
        'Application',
        'EdpMarkdown',
        'PhlyMongo',
        'PhlyPaste',
        'ScnSocialAuth',
        'EdpGithub',
        'ZfcBase',
        'ZfcUser',
    ),
    'module_listener_options' => array(
        'config_glob_paths' => $configGlobPaths,
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);
