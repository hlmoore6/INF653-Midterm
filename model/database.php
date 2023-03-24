<?php
$host = "jtb9ia3h1pgevwb1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$database_name = "npfxf11d1mq704fe";
$username = "sbz0foed3y8xx25e";
$password = "k5a91ow601fmq3ue";

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
    echo $e->getMessage();
    $database = null;
}
?>