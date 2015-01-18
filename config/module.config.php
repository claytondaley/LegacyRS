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

use ZfcRbac\Guard\GuardInterface;

return array(
    'controllers' => array(
        'invokables' => array(
            'LegacyRS\Controller\LegacyRS' => 'LegacyRS\Controller\LegacyRSController',
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'LegacyRS\Integration\ZfcUserListener'              => 'LegacyRS\Integration\ZfcUserListener',
            'LegacyRS\Hydrator\Strategy\DateTimeStrategy'       => 'LegacyRS\Hydrator\Strategy\DateTimeStrategy',
            'LegacyRS\Hydrator\Strategy\UsergroupNameStrategy'  => 'LegacyRS\Hydrator\Strategy\UsergroupNameStrategy',
            'LegacyRS\Hydrator\Strategy\UsergroupStrategy'      => 'LegacyRS\Hydrator\Strategy\UsergroupStrategy',
        ),
        'factories' => array (
            'LegacyRS\Role\RoleProvider' => 'LegacyRS\Role\Factory\RoleProviderFactory',
        ),
        'aliases' => array(
            'Zend\Authentication\AuthenticationService' => 'zfcuser_auth_service'
        ),
    ),
    'form_elements' => array(
        'delegators' => array(
            'zfcuseradmin_createuser_form' => array(
                'LegacyRS\Delegator\ZfcUserAdminCreateForm',
            ),
            'zfcuseradmin_edituser_form' => array(
                'LegacyRS\Delegator\ZfcUserAdminEditForm',
            ),
            'ZfcUserAdmin\Table\UserList' => array(
                'LegacyRS\Delegator\ZfcUserAdminUserList',
            ),
        )
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
                        'action'        => 'index',
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
                                'action'        => 'index',
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
                                'action'        => 'login',
                            ),
                        ),
                    ),
                    # Hijack user profile call and redirect to ZfcUser page
                    'hijack-profile' => array(
                        'type' => 'Literal',
                        'may_terminate' => true,
                        'options' => array(
                            'route' => 'pages/user_preferences.php',
                            'defaults' => array(
                                '__NAMESPACE__' => 'LegacyRS\Controller',
                                'controller'    => 'LegacyRS',
                                'action'        => 'redirect',
                                'route'         => 'zfcuser'
                            ),
                        ),
                    ),
                    # Hijack user admin page and redirect to ZfcUserAdmin page
                    'hijack-user-list' => array(
                        'type' => 'Literal',
                        'may_terminate' => true,
                        'options' => array(
                            'route' => 'pages/team/team_user.php',
                            'defaults' => array(
                                '__NAMESPACE__' => 'LegacyRS\Controller',
                                'controller'    => 'LegacyRS',
                                'action'        => 'redirect',
                                'route'         => 'zfcadmin/zfcuseradmin/list'
                            ),
                        ),
                    ),
                    # Hijack user admin page and redirect to ZfcUserAdmin page
                    'hijack-user-edit' => array(
                        'type' => 'Literal',
                        'may_terminate' => true,
                        'options' => array(
                            'route' => 'pages/team/team_user_edit.php',
                            'defaults' => array(
                                '__NAMESPACE__' => 'LegacyRS\Controller',
                                'controller'    => 'LegacyRS',
                                'action'        => 'redirect',
                                'route'         => 'zfcadmin/zfcuseradmin/edit'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'legacyrs_entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/LegacyRS/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'LegacyRS\Entity' => 'legacyrs_entities'
                )
            )
        ),
        'configuration' => array(
            'orm_default' => array(
                'types' => array(
                    'timestamp' => 'LegacyRS/Type/TimestampType',
                )
            )
        )
    ),
    'zfc_rbac' => array (
        'protection_policy' => GuardInterface::POLICY_DENY,
        'guest_role' => '-1',
        'role_provider' => array(
            'ZfcRbac\Role\ObjectRepositoryRoleProvider' => array(
                'object_manager'     => 'doctrine.entitymanager.orm_default',
                'class_name'         => 'LegacyRS\Entity\Usergroup',
                'role_name_property' => 'id',
            ),
        ),
        'guards' => array (
            'ZfcRbac\Guard\ControllerPermissionsGuard' => array (
                // must have admin ('a') to access admin
                array (
                    'controller' => 'ZfcAdmin\Controller\AdminController',
                    'permissions' => ['a'],
                ),
                // must have admin ('a') and manage users ('u') to reach user admin
                array (
                    'controller' => 'zfcuseradmin',
                    'permissions' => ['a', 'u'],
                ),
                // zfcuser automatically requires an authenticated user for problem routes
                // only login and register are available by default
                // eventually, we will manage register using a setting, but not yet
                array (
                    'controller' => 'zfcuser',
                    'permissions' => ['*'],
                ),
                // this should be redirected not unauthorized
                array (
                    'controller' => 'LegacyRS\Controller\LegacyRS',
                    'permissions' => ['user'],
                ),
            ),
        ),
        'redirect_strategy' => array(
            'redirect_when_connected'        => false,
            'redirect_to_route_connected'    => 'home',
            'redirect_to_route_disconnected' => 'zfcuser/login',
            'append_previous_uri'            => true,
            'previous_uri_query_key'         => 'redirect'
        ),
    ),

    'zfcuseradmin' => array(
        /**
         * Mapper for ZfcUser
         *
         * Set the mapper to be used here
         * Currently Available mappers
         *
         * ZfcUserAdmin\Mapper\UserDoctrine
         *
         * By default this is using
         * ZfcUserAdmin\Mapper\UserZendDb
         */
        'user_mapper' => 'ZfcUserAdmin\Mapper\UserDoctrine',

        /**
         * Array of data to show in the user list
         * Key = Label in the list
         * Value = entity property(expecting a 'getProperty())
         */
        'user_list_elements' => array(
            'Status' => 'state',
            'Username' => 'username',
            'Full Name' => 'display_name',
            'Email' => 'email',
        ),
    ),
);