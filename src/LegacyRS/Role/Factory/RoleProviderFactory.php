<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 1/18/2015
 * Time: 4:23 PM
 */

namespace LegacyRS\Role\Factory;

use LegacyRS\Role\RoleProvider;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RoleProviderFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $roleProvider = new RoleProvider;
        $roleProvider->setEntityManager(
            $serviceLocator->get('doctrine.entitymanager.orm_default')
        );

        return $roleProvider;
    }
}