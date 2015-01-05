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

    public function onBootstrap(MvcEvent $e)
    {
        // Attach Login Helper to ZfcUser Event 'authenticate'
        $sm = $e->getApplication()->getServiceManager();
        $zfcAuthEvents = $e->getApplication()->getEventManager()->getSharedManager();
        $sm->get('LegacyRS\Event\ZfcUserListener')->attachShared($zfcAuthEvents);
    }

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
