<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbport = 3307;
    $dbuser = "root";
    $dbpass = "";
    $dbname = "db_votacion";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport) or die("Connect failed: %s\n" . $conn->error);
    return $conn;
}
function CloseCon($conn)
{
    $conn->close();
}
