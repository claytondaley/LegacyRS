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

namespace LegacyRS\Config;

use DaleyConfig\Form\Annotation as Config;

/*
 * @Config\TargetFile("config/autoload/legacyrs.db.local.php")
 */
class DatabaseSettings
{
    /*
     * @Config\Options({"label":"Database Engine:"})
     */
    private $driverClass;

    /*
     * @Config\Attributes({"type":"text" })
     * @Config\ReplacesTag("{host}")
     */
    private $host;

    /*
     * @Config\Attributes({"type":"number" })
     * @Config\ReplacesTag("{port}")
     */
    private $port = "3306";

    /*
     * @Config\Attributes({"type":"text" })
     * @Config\ReplacesTag("{user}")
     */
    private $user;

    /*
     * @Config\Attributes({"type":"text" })
     * @Config\ReplacesTag("{password}")
     */
    private $password;

    /*
     * @Config\Attributes({"type":"text" })
     * @Config\ReplacesTag("{dbname}")
     */
    private $dbname;

    private $template =
    "<?php
    return array(
        'doctrine' => array(
            'connection' => array(
                'orm_default' => array(
                    'driverClass' =>'Doctrine\\DBAL\\Driver\\PDOMySql\\Driver',
                    'params' => array(
                        'host'     => \"{host}\",
                        'port'     => \"{port}\",
                        'user'     => \"{user}\",
                        'password' => \"{password}\",
                        'dbname'   => \"{dbname}\",
                    )
                )
            )
        )
    );";
}

