
<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "goqii_tech";
    
    define("MYSQL_CONN_ERROR", "Unable to connect to database.");

    mysqli_report(MYSQLI_REPORT_STRICT);

    // Connect function for database access
    function connect($servername, $username, $password, $dbname) {
        try {
            $conn = new mysqli($servername, $username, $password, $dbname);
            return $conn;
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }

    try {
        $conn = connect($servername, $username, $password, $dbname);
        // echo print_r($conn);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    
?>