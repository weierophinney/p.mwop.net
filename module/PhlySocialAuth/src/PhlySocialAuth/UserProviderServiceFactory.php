<?php
namespace PhlySocialAuth;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator;

class UserProviderServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $options = $services->get('ScnSocialAuth-ModuleOptions');
        $entityClass = $options->getUserProviderEntityClass();

        $mapper = new UserProvider();
        $mapper->setDbAdapter($services->get('ScnSocialAuth_ZendDbAdapter'));
        $mapper->setEntityPrototype(new $entityClass);
        $mapper->setHydrator(new Hydrator\ClassMethods);
        return $mapper;
    }
}
