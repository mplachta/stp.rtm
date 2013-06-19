<?php
return array(
    'router' => array(
        'routes' => array(
            'dashboard' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/:configName',
                    'constraints' => array(
                        'configName' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Dashboard\Controller\Dashboard',
                        'action'     => 'dashboard',
                    ),
                ),
            ),
            'lpServer' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/resources/:configName/:id[/:oldHash]',
                    'constraints' => array(
                        'configName' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Dashboard\Controller\LongPollingController',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Dashboard\Controller\Dashboard' => 'Dashboard\Controller\DashboardController',
            'Dashboard\Controller\LongPollingController' => 'Dashboard\Controller\LongPollingController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'dashboard' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    'dashboardCache' => array(
        'ttl' => 3600*24*7, // 7 days
        'namespace' => 'dashboard',
        'key_pattern' => null,
        'readable'  => true,
        'writable' => true,
        'servers' => 'localhost',
    ),
);
