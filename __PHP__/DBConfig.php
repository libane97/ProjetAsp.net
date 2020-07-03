<?php

/**
 * @author Papa Magueye GUEYE - MagueyeTech
 * @email magueyetech@gmail.com
 * @create date 02/07/2020 22:46:46
 * @modify date 02/07/2020 22:46:46
 * @desc Classe de connexion a la base de donnee
 */

class DBConnection
{

    private static $config = [
        'driver'   => 'mysql',
        'host'     => "localhost:3308",
        'dbname'   => "m1gl_aspnet_mysql",
        'username' => "root",
        'password' => ""
    ];

    // Database Connection
    private static $dbc;


    /* Function getPDOConnection
     * Get a connection to the database using PDO.
     */
    private static function getPDOConnection()
    {
        // Check if the connection is already established
        if (self::$dbc == NULL) {
            $dsn = "" . self::$config['driver'] . ":host=" . self::$config['host'] . ";dbname=" . self::$config['dbname'];
            try {
                self::$dbc = new PDO($dsn, self::$config['username'], self::$config['password']);
                return self::$dbc;
            } catch (PDOException $e) {
                echo __LINE__ . $e->getMessage();
                return null;
            }
        }
    }

    public static function runQuery($sql)
    {
        $dbc = self::getPDOConnection();
        try {
            $count = $dbc->exec($sql);
        } catch (PDOException $e) {
            echo __LINE__ . $e->getMessage();
        }

        return $count;
    }

    public static function getQuery($sql)
    {
        $dbc = self::getPDOConnection();
        $stmt = $dbc->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        return $stmt;
    }
}
