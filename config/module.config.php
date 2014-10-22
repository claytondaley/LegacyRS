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
                    $instance->add_analytics_server($sm->get('DaleyPiwik\Service\PhpTracker'));
                }
            }
        )
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'LegacyRS\Controller',
                        'controller'    => 'LegacyRS',
                        'action'     => 'index',
                    ),
                ),
            ),
            'wildcard' => array(
                'type' => 'hostname',
                'options' => array(
                    'route' => ':subdomain.:domain.:tld',
                    'defaults' => array(
                        '__NAMESPACE__' => 'LegacyRS\Controller',
                        'controller'    => 'LegacyRS',
                        'action'        => 'index'
                    )
                )
            )
        )
    )
);