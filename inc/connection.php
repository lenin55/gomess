<?php

define('COMPANY_NAME', "Lenin");
define('ADMIN_EMAIL_ID', "info@lenin.com");
define('ADDRESS', "");
define('JOB_POSITION', "Lenin");
define('GOOGLE_GEOCODING_API', '');


/*
 * DB Config at Jayam
 * /
  define('DBHOST', "localhost");
  define('DBNAME', "jayamco_unavu");
  define('DBUSER', "jayamco_unavu");
  define('DBPASS', "Unavu_123");
  // */

/*
 * DB Config local
 */
define('DBHOST', "localhost");
define('DBNAME', "gomessup");
define('DBUSER', "root");
define('DBPASS', "");
//*/

date_default_timezone_set('Europe/London');
define('HOME_URL', 'http://localhost/unavu/');

ob_start();
session_start();

class Connection {

    var $hostname, $username, $password, $database;

    function __construct() {
        $this->hostname = DBHOST; //Database host.
        $this->username = DBUSER; //Database username.
        $this->password = DBPASS; //Database password.
        $this->database = DBNAME; //Database.local
        $this->dbConnection();
    }

    public function dbConnection() {
        $connection = mysql_connect($this->hostname, $this->username, $this->password) or die('Cannot make a connection');
        if ($connection) {
            $selectDB = mysql_select_db($this->database) or die('Cannot select database');
        }
    }

}

$connect = new Connection();
