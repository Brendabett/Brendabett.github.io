<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Assets;
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


    public function getServiceConfig()
    {
        //NOTE
        /*
            - Replace AdminTable with your custom table eg. AssetsTable - lives in module/Assets/src/Model/AssetsTable
        */
        return [
            'factories' => [
                Model\AssetsTable::class => function($container) {
                    $tableGateway = $container->get(Model\AssetsTableGateway::class);
                    return new Model\AssetsTable($tableGateway);
                },
                Model\AssetsTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    return new TableGateway('Assets', $dbAdapter, null, $resultSetPrototype);
                }
            ],
        ];
    }
}