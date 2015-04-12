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
            'LegacyRS\Controller\LegacyRS'  => 'LegacyRS\Controller\LegacyRSController',
            'LegacyRS\Router\QueryFilter'   => 'LegacyRS\Router\QueryFilter',
        ),
        'factories' => array(
            'LegacyRS\Controller\Redirect'  => 'LegacyRS\Factory\Controller\RedirectController',
        )
    ),
    'router' => array(
        'routes' => array(
            # Catchall to make any legacy pages not hijacked are routed to the controller
            'legacyrs' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '[/][:path]',
                    'constraints' => array(
                        'path' => '.*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'LegacyRS\Controller',
                        'controller'    => 'LegacyRS',
                        'action'        => 'legacy'
                    ),
                ),
            ),
            # Hijack login (and logout) route
            'hijack-auth' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/login.php',
                    'defaults' => array(
                        '__NAMESPACE__' => 'LegacyRS\Controller',
                        'controller'    => 'Redirect',
                        'action'        => 'auth',
                    ),
                ),
            ),
            # Hijack user profile page
            'hijack-user-profile' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/pages/user_preferences.php',
                    'defaults' => array(
                        '__NAMESPACE__' => 'LegacyRS\Controller',
                        'controller'    => 'Redirect',
                        'action'        => 'default',
                        'name'          => 'userProfile',
                    ),
                ),
            ),
            # Hijack user change password page
            'hijack-user-reset-password' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/pages/user_password.php',
                    'defaults' => array(
                        '__NAMESPACE__' => 'LegacyRS\Controller',
                        'controller'    => 'Redirect',
                        'action'        => 'default',
                        'name'          => 'resetPassword',
                    ),
                ),
            ),
            # Hijack user admin list page
            'hijack-admin-user-list' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/pages/team/team_user.php',
                    'defaults' => array(
                        '__NAMESPACE__' => 'LegacyRS\Controller',
                        'controller'    => 'Redirect',
                        'action'        => 'default',
                        'name'          => 'adminUserList',
                    ),
                ),
            ),
            # Hijack user admin edit page
            'hijack-admin-user-edit' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/pages/team/team_user_edit.php',
                    'defaults' => array(
                        '__NAMESPACE__' => 'LegacyRS\Controller',
                        'controller'    => 'Redirect',
                        'action'        => 'default',
                        'name'          => 'adminUserEdit',
                    ),
                ),
            ),
            # Hijack "Help & advice" link
            'hijack-help' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/pages/help.php',
                    'defaults' => array(
                        '__NAMESPACE__' => 'LegacyRS\Controller',
                        'controller'    => 'Redirect',
                        'action'        => 'default',
                        'name'          => 'help',
                    ),
                ),
            ),
            # Hijack "Contact Us" link
            'hijack-contact' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/pages/contact.php',
                    'defaults' => array(
                        '__NAMESPACE__' => 'LegacyRS\Controller',
                        'controller'    => 'Redirect',
                        'action'        => 'default',
                        'name'          => 'contact',
                    ),
                ),
            ),
        ),
    ),
);