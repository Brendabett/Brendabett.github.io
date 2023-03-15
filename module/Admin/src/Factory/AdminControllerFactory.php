<?php
namespace Admin\Factory;
use Admin\Controller\AdminController;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Assets\Model\AssetsTable;
use Subscriptions\Model\SubscriptionsTable;

//use Psr\Container\ContainerInterface;

class AdminControllerFactory implements FactoryInterface
{
    private $container;
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
   {
    {
        // Create the service and inject dependencies into its constructor.
        $assetsTable = $container->get(AssetsTable::class);
        
        //Return Dependecies
        return new AdminController($assetsTable);
    }
    {
        // Create the service and inject dependencies into its constructor.
        $subTable = $container->get(SubscriptionsTable::class);
        
        //Return Dependecies
        return new SubscriptionsController($subTable);
    }
   
   }
}