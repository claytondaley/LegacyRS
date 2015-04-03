<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 4/9/2015
 * Time: 4:57 PM
 */
namespace LegacyRS\Factory\Controller;

use LegacyRS\Controller;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RedirectController implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->getServiceLocator()->get('config')['LegacyRS'];
        $controller = new Controller\RedirectController($config['routes']);
        return $controller;
    }
}