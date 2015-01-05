<?php
/**
 * Copyright (C) 2014 Clayton Daley III
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

return array(
    'controllers' => array(
        'invokables' => array(
            'LegacyRS\Controller\LegacyRS' => 'LegacyRS\Controller\LegacyRSController',
        ),
        'initializers' => array (
            function ($instance, $sm) {
                if ($instance instanceof \LegacyRS\Controller\LegacyRSController) {
                    $instance->addServerSideAnalytics($sm->getServiceLocator()->get('DaleyPiwik\Service\PhpTracker'));
                }
            },
        )
    ),
    'service_manager' => array(
        'invokables' => array(
            'LegacyRS\Event\ZfcUserListener' => 'LegacyRS\Event\ZfcUserListener',
        ),
    ),
    'router' => array(
        'routes' => array(
            # Catchall to make sure legacy pages all get routed to the controller
            'wildcard' => array(
                'type' => 'Hostname',
                'may_terminate' => true,
                'options' => array(
                    'route' => ':subdomain.:domain.:tld',
                    'defaults' => array(
                        '__NAMESPACE__' => 'LegacyRS\Controller',
                        'controller'    => 'LegacyRS',
                        'action'        => 'index'
                    ),
                ),
            ),
            'legacyrs' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'LegacyRS\Controller',
                        'controller'    => 'LegacyRS',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array (
                    'home' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route'    => 'application',
                            'defaults' => array(
                                '__NAMESPACE__' => 'LegacyRS\Controller',
                                'controller'    => 'LegacyRS',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    # Hijack login (and logout by query string) route and redirect to authentication providers
                    'hijack-login' => array(
                        'type' => 'Literal',
                        'may_terminate' => true,
                        'options' => array(
                            'route' => 'login.php',
                            'defaults' => array(
                                '__NAMESPACE__' => 'LegacyRS\Controller',
                                'controller'    => 'LegacyRS',
                                'action'        => 'login'
                            ),
                        ),
                    ),
                )
            ),
        ),
    ),
    'doctrine' => array(
        'configuration' => array(
            'orm_default' => array(
                'types' => array(
                    'timestamp' => 'LegacyRS/Type/TimestampType',
                )
            )
        )
    ),
);