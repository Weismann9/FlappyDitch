<?php

require_once 'php/db_connection.php';

if (session_destroy()) {
    header("location: /index.php");
}
