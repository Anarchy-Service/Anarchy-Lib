<?php
declare(strict_types=1);

namespace AnarchyService\DB;

/**
 * Class DB
 * @package AnarchyService
 */
class DB
{
    public static $instance;

    /**
     * @return Json|MongoDB|Mysql
     */

    public static function Database()
    {
        $DB = getenv('DB');
        if ($DB == 'json') {
            self::$instance = new Json();
        } elseif ($DB == 'mysql') {
            self::$instance = new Mysql();
        } elseif ($DB == 'mongodb') {
            self::$instance = new MongoDB();
        }
        return self::$instance;
    }
}
