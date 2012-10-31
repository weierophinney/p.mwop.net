<?php
namespace Application;

use Mongo;
use MongoDB;
use MongoCollection;
use PhlyPaste\Model\MongoPasteService;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $e->getApplication()->getServiceManager()->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array('factories' => array(
            'Paste\Mongo'            => function ($services) {
                $config = $services->get('config');
                $config = $config['mongo']['connection'];
                return new Mongo($config['server'], $config['options']);
            },
            'Paste\MongoDb'          => function ($services) {
                $config = $services->get('config');
                $config = $config['mongo']['db'];
                $cxn    = $services->get($config['cxn']);
                return new MongoDB($cxn, $config['name']);
            },
            'Paste\MongoCollection'  => function ($services) {
                $config = $services->get('config');
                $config = $config['mongo']['paste_collection'];
                $db     = $services->get($config['db']);

                $collection = new MongoCollection($db, $config['name']);
                $collection->ensureIndex(array('hash' => 1), array('unique' => true));
                $collection->ensureIndex(array('timestamp' => -1));
                return $collection;
            },
            'PhlyPaste\MongoService' => function ($services) {
                $collection = $services->get('Paste\MongoCollection');
                return new MongoPasteService($collection);
            },
        ));
    }
}
