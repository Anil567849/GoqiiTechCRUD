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

    <div class="container-fuild">
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
      </div>
    

      <!-- SHOW DATA FROM DB  -->
      <div class="col-md-6 card">
        <h2>show users data here</h2>
      </div>
    </div>
      
      

    </div>
  </body>
</html>
