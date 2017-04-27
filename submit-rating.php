<?php

  $servername = "localhost";
  $username = "root";
  $password = "1234";
  $dbname = "travel_db";



    if( $_GET["country"]) {
      $countryCode = $_GET["country"];
    }

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }



  $conn->close();
?>
