<?php

    // CONNECT TO DB 
    require_once('../shared/conn.php');

    // GET ID FROM GET_METHOD
    $id = $_GET['id'];

    // QUERY 
    $query = "DELETE FROM users WHERE id = $id";
    $result = $conn->query($query);

    if ($result === TRUE) {
        $conn->close();
        $go_to = "Location: ../index.php?success=true";
        header($go_to);
    } else {
        echo '<h1>Error: '.$conn->error.'</h1><br>';
        echo '<a href="../index.php?success=false">Go Back</a>';
        $conn->close();
        exit;
    }

?>