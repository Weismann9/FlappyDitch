<?php

require_once 'src/project_init.php';

if (session_destroy()) {
    header("location: /index.php");
}
