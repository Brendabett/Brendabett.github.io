<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Subscriptions;
// Add these import statements:
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig() : array
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    // Add this method:
    public function getServiceConfig()
    {
        //NOTE
        /*
            - Replace AdminTable with your custom table eg. AssetsTable - lives in module/Assets/src/Model/AssetsTable
        */
        return [
            'factories' => [
                Model\SubscriptionsTable::class => function($container) {
                    $tableGateway = $container->get(Model\SubscriptionsTableGateway::class);
                    return new Model\SubscriptionsTable($tableGateway);
                },
                Model\SubscriptionsTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    return new TableGateway('subscriptions', $dbAdapter, null, $resultSetPrototype);
                }
            ],
        ];
    }
}
