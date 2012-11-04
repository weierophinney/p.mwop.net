<?php
namespace PhlySocialAuth;

use Zend\Stdlib\Hydrator;

class Module
{
    public function getAutoloaderConfig()
    {
        return array('Zend\Loader\StandardAutoloader' => array(
            'namespaces' => array(
                __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
            ),
        ));
    }

    public function getServiceConfig()
    {
        return array('factories' => array(
            'ScnSocialAuth-UserProviderMapper' => function ($services) {
                $options = $services->get('ScnSocialAuth-ModuleOptions');
                $entityClass = $options->getUserProviderEntityClass();

                $mapper = new UserProvider();
                $mapper->setDbAdapter($services->get('ScnSocialAuth_ZendDbAdapter'));
                $mapper->setEntityPrototype(new $entityClass);
                $mapper->setHydrator(new Hydrator\ClassMethods);
                return $mapper;
            },
        ));
    }
}
