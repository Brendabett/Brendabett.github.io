<?php
namespace Assets\Factory;
use Assets\Controller\AssetsController;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Laminas\Authentication\AuthenticationService;
//use Admin\Model\AdminTable;
use Assets\Model\AssetsTable;
//use Psr\Container\ContainerInterface;

class AssetsControllerFactory implements FactoryInterface
{
    private $container;
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // Create the service and inject dependencies into its constructor.
        //$sauthService = $container->get(AdminAdapter::class);
    	$assetsTable = $container->get(AssetsTable::class);
        //Return Dependecies
        return new AssetsController(
            $assetsTable
        );
    }
}