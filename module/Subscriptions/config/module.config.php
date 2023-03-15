<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Subscriptions;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'sub' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/sub',
                    'defaults' => [
                        'controller' => Controller\SubscriptionsController::class,
                        'action'     => 'sub',
                    ],
                ],
            ],
            'add-new-sub' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/addnewsub',
                    'defaults' => [
                        'controller' => Controller\SubscriptionsController::class,
                        'action'     => 'addnewsub',
                    ],
                ],
            ],
            'process-new-sub' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/processnewsub',
                    'defaults' => [
                        'controller' => Controller\SubscriptionsController::class,
                        'action'     => 'processnewsub',
                    ],
                ],
            ],
            
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\SubscriptionsController::class => Factory\SubscriptionsControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],  
    
];
