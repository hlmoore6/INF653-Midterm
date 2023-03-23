<?php
$host = "localhost";
$database_name = "zippyusedautos";
$username = "mgs_user";
$password = "pa55word";

$database = null;

try {
    if ($database == null) {
        global $host;
        global $database_name;
        global $username;
        global $password;

        $dsn = "mysql:host=" . $host . ";dbname=" . $database_name;
        $database = new PDO($dsn, $username, $password);
    }
} catch (PDOException $e) {
    $database = null;
    include("error.php");
}
?>