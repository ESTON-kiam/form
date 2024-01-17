<?php
    if (isset($_POST['name']) && isset($_POST['id']) && isset($_POST['specialist'])) {
      $name = $_POST['name'];
      $id = $_POST['id'];
      $password= $_POST['password'];
      $specialist = $_POST['specialist'];
      // Connect to the database
      $conn = new mysqli("localhost", "root", "", "hospital");
      // Check if the user is already registered
      $sql = "SELECT * FROM patients WHERE id = '$id'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        echo "The user is already registered.";
      } else {
        // Insert the user into the database
        $sql = "INSERT INTO patients (name, id,specialist, password) VALUES ('$name', '$id', '$specialist','$password')";
        $conn->query($sql);
        echo "The user has been registered successfully.";
      }
      // Close the connection
      $conn->close();
    }
  ?>