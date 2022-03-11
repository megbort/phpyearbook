<?php

    define('_HOST_NAME', 'localhost');
    define('_DATABASE_NAME', 'classlist');
    define('_DATABASE_USER_NAME', 'root');
    define('_DATABASE_PASSWORD', '');

    /////// CONNECT TO MySQL & THE DATABASE ///////
    $conn = new MySQLi(_HOST_NAME, _DATABASE_USER_NAME, _DATABASE_PASSWORD, _DATABASE_NAME);

    // Feedback if PHP script does NOT work
    if($conn->connect_errno) {
        die("ERROR : -> ".$conn->connect_error);
    }

?>