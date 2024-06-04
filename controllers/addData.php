<?php

    // CONNECT TO DB
    require_once('../shared/conn.php');

    if(isset($_POST['userDataSubmit'])){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // GET DATA FROM POST METHOD
        $user_name = $_POST['nameField'];
        $user_email = $_POST['emailField'];
        $user_pass = $_POST['passField'];
        $user_dob = $_POST['dobField'];

        // QUERY 
        $sql = "INSERT INTO users (name, email, password, dob) VALUES ('$user_name', '$user_email', '$user_pass', '$user_dob')";
        $result = $conn->query($sql);

        if($result){
          $conn->close();
          $go_to = "Location: ../index.php?success=true";
          header($go_to);
        }else{
          echo '<h1>Error: '.$conn->error.'</h1><br>';
          echo '<a href="../index.php?success=false">Go Back</a>';
          $conn->close();
          exit;
        }
        
    }
  }

?>