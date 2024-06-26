<?php

  // CONNECT TO DB 
    require_once('shared/conn.php');

    // CREATE A TABLE 
    function createTableIfNotExist($conn, $tableName){
      $create_table = "CREATE TABLE IF NOT EXISTS $tableName (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        dob DATE NOT NULL
      )";
      $conn->query($create_table);
    }

    createTableIfNotExist($conn, "users");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Goqii Tech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>



    <?php

    if(isset($_GET['id'])){ // UPDATE DATA
      $id = $_GET['id'];
      
      // QUERY
      $sql = "SELECT * FROM users WHERE id = $id";
      $result = $conn->query($sql);
      if($result){
        while ($row = $result->fetch_assoc()) {

          // GET DATA FROM DB
          $user_name = $row['name'];
          $user_email = $row['email'];
          $user_pass = $row['password'];
          $user_dob = $row['dob'];

          // FORM 
          echo '<div class="container-fuild">
          <div class="row">
            <div class="col-md-6 card">
              <h1 class="text-center">Goqii Tech - Health and Wellness</h1>
              <form method="post" action="controllers/updateData.php?id='.$id.'">
                <div class="mb-3">
                  <label for="nameField" class="form-label">Name</label>
                  <input required name="nameField" type="text" class="form-control" id="nameField" value='.$user_name.'>
                </div>
                <div class="mb-3">
                  <label for="emailField" class="form-label">Email</label>
                  <input required name="emailField" type="email" class="form-control" id="emailField" value='.$user_email.'>
                </div>
                <div class="mb-3">
                  <label for="passField" class="form-label">Password</label>
                  <input required name="passField" type="password" class="form-control" id="passField" value='.$user_pass.'>
                </div>
                <div class="mb-3">
                  <label for="dobField" class="form-label">DOB</label>
                  <input required name="dobField" type="date" class="form-control" id="dobField" value='.$user_dob.'>
                </div>
                <button name="userDataUpdate" type="submit" class="btn btn-warning">Update</button>
              </form>
            </div>';
        }
      }




    }else{ // ADD DATA

      echo '<div class="container-fuild">
      <div class="row ">
        <div class="col-md-6 card">
          <h1 class="text-center">Goqii Tech - Enter User Data</h1>
          <form method="post" action="controllers/addData.php">
            <div class="mb-3">
              <label for="nameField" class="form-label">Name</label>
              <input required name="nameField" type="text" class="form-control" id="nameField">
            </div>
            <div class="mb-3">
              <label for="emailField" class="form-label">Email</label>
              <input required name="emailField" type="email" class="form-control" id="emailField">
            </div>
            <div class="mb-3">
              <label for="passField" class="form-label">Password</label>
              <input required name="passField" type="password" class="form-control" id="passField">
            </div>
            <div class="mb-3">
              <label for="dobField" class="form-label">DOB</label>
              <input required name="dobField" type="date" class="form-control" id="dobField">
            </div>
            <button name="userDataSubmit" type="submit" class="btn btn-primary">Add</button>
          </form>
      </div>';
    }
    ?>

      <!-- SHOW DATA FROM DB  -->
      <div class="col-md-6 card">
        <?php 
          $sql = "SELECT id, name, email, dob FROM users";

          $result = $conn->query($sql);
          if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                $primaryKeyValue = $row['id'];
                echo '<div class="card">
                    <p>Name: '.$row['name'].'</p>
                    <p>Email: '.$row['email'].'</p>
                    <p>DOB: '.$row['dob'].'</p>
                    <div>
                    <a href="index.php?id='.$primaryKeyValue.'" name="updateData" type="submit" class="btn btn-sm btn-warning">Update</a>
                    <a href="controllers/deleteData.php?id='.$primaryKeyValue.'" name="deleteData" type="submit" class="btn btn-sm btn-danger">Delete</a>
                    </div>
                </div>';

              }
          }else{
              echo "<h1>No Data Found</h1>";
          }
        ?>
      </div>
    </div>
      
      

    </div>
  </body>
</html>
