<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'view_manager' => array(
        'display_not_found_reason' => false,
        'display_exceptions'       => false,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
            'phly-paste/paste/form'   => __DIR__ . '/../view/paste/form.phtml',
            'phly-paste/paste/help'   => __DIR__ . '/../view/paste/help.phtml',
            'phly-paste/paste/list'   => __DIR__ . '/../view/paste/list.phtml',
            'phly-paste/paste/view'   => __DIR__ . '/../view/paste/view.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'disqus' => array(
        'key'         => 'YOURKEYHERE',
        'development' => 1,
    ),
);
