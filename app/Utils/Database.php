<?php

namespace Socks\Utils;

use PDO;

// Retain its use  => Database::getPDO()
// Design Pattern : Singleton
class Database
{
    /**
     * PDO object representing the connection to the database
     *
     * @var PDO
     */
    private $dbh;

    /**
     * Static property (linked to the class) storing the unique object instance
     *
     * @var Database
     */
    private static $_instance;

    /**
     * Construct
     *
     * In private visibility
     * => Only the code of the class has the right to create an instance of this class
     */
    private function __construct()
    {
        // Retrieving data from the config file
        // The parse_ini_file function parses the file and returns an associative array
        $configData = parse_ini_file(__DIR__ . '/../config.ini');

        // PHP tries to execute all the code inside the "try" block
        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Displays SQL errors on screen
            );
        } catch (\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage() . '<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    /**
     * Method allowing to return, in all cases,
     * the dbh property (PDO object) of the unique Database instance
     *
     * @return PDO
     */
    public static function getPDO()
    {
        // If we have not yet created the only instance of the class
        if (empty(self::$_instance)) {
            // So, we create this instance and store it in the static property $_instance
            self::$_instance = new Database();
        }
        // Otherwise, nothing is done the instance has already been created

        // Finally, we return the dbh property of the single instance of Database
        return self::$_instance->dbh;
    }
}
