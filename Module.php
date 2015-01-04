<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace LegacyRS;

use Zend\Mvc\MvcEvent;

class Module
{
    /*
    public function onBootstrap(MvcEvent $event)
    {
        // Attach Login Helper to ZfcUser Event 'authenticate'
        $eventManager       = $event->getApplication()->getEventManager();
        // $sharedEventManager = $eventManager->getSharedManager();
        $eventManager->attachAggregate('LegacyRS/Event/LoginListener', -100);
    }
    */

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
