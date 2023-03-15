<?php
namespace Subscriptions\Factory;
use Subscriptions\Controller\SubscriptionsController;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Laminas\Authentication\AuthenticationService;
use Subscriptions\Model\SubscriptionsTable;
//use Psr\Container\ContainerInterface;

class SubscriptionsControllerFactory implements FactoryInterface
{
    private $container;
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // Create the service and inject dependencies into its constructor.
        $subTable = $container->get(SubscriptionsTable::class);
        
        //Return Dependecies
        return new SubscriptionsController(

        	$subTable
        );
    }
}