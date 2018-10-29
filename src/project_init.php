<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 10/26/18
 * Time: 8:25 PM
 */

require_once 'config/db_config.php';
require_once 'config/app_config.php';

// Create connection
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

function if_session_starter()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

ini_set('session.gc_maxlifetime', 3600);
if_session_starter();