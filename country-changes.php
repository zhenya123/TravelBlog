<?php

  $showMessage = FALSE;

  if(isset($_POST['submit']))
  {
    $showMessage = TRUE;
    submitRating();
  }

  function setConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_travel";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;

  }

  function getCountryNameHelper($conn) {
    $countryName = "Countries' Comparison";
    $countryCode = getCountryCode();

    if($countryCode != "stats") {
      $sql = "SELECT country_name FROM COUNTRIES WHERE country_code = '" . $countryCode . "'";
      $result  = $conn->query($sql);
      while ($row = $result->fetch_assoc()){
        $countryName = $row['country_name'];
      }
    }

    return $countryName;
  }

  function getCaptionsHelper($conn) {

    $captions = array();
    $number = 1;

    $countryCode = getCountryCode();

    $sql = "SELECT image_description FROM COUNTRIES_IMAGES WHERE country_code = '" . $countryCode . "'";
    $result  = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
      $parts = explode(';' , $row['image_description']);
      $captions[$number] = $parts[0];
      $captions[$number+1] = $parts[1];
      $number = $number + 2;
    }
    return $captions;
  }

  function getImagesHelper($conn) {
    $images = array();
    $number = 1;
    $countryCode = getCountryCode();

    $sql = "SELECT image_path FROM COUNTRIES_IMAGES WHERE country_code = '" . $countryCode . "'";
    $result  = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
      $images[$number] = $row['image_path'];
      $number = $number + 1;
    }
    return $images;

  }

  function getDescriptionsHelper($conn) {
    $descriptions = array();
    $countryCode = getCountryCode();

    $sql = "SELECT country_description FROM COUNTRIES WHERE country_code = '" . $countryCode . "'";
    $result  = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
      $descriptions = explode(';' , $row['country_description']);
    }
    return $descriptions;

  }

  function getRatingsHelper($conn) {
    $ratings = array();
    $countryCode = getCountryCode();

    $sql = "SELECT category_name, avg(rating) as average_rating
    FROM Rating_Categories rc NATURAL JOIN RATINGS r
    WHERE country_code = '" . $countryCode . "'
    GROUP BY category_name";
    $result  = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
      $ratings[$row['category_name']] = $row['average_rating'];
    }
    return $ratings;
  }

  function submitRatingsHelper($conn, $category, $countryCode) {
    $categoryID = array();
    foreach ($category as $catName=>$rating) {
      $getCategory = "SELECT Category_ID FROM Rating_Categories WHERE Category_Name = '$catName'";
      $result  = $conn->query($getCategory);
      while ($row = $result->fetch_assoc()){
        $categoryID[$catName] = $row['Category_ID'];
      }
    }

    foreach ($category as $catName=>$rating) {
      $insert = "INSERT INTO Ratings (Country_Code, Category_ID, Rating) VALUES('$countryCode', '$categoryID[$catName]', '$rating')";
      if ($conn->query($insert) === TRUE) {
      } else {
         echo "Error: " . $insert. "<br>" . $conn->error;
      }

    }
  }

  function fetchCategories() {
    $category = array(
      'food' => $_POST['food'],
      'hospitality' => $_POST['hospitality'],
      'wealth' => $_POST['wealth'],
      'safety' => $_POST['safety']);

    return $category;
  }



  function fetchCountryCode() {
    $countryCode =   $_POST['code'];
    return $countryCode;
  }


  function getCountryName() {
    $conn = setConnection();
    $countryName = getCountryNameHelper($conn);
    closeConnection($conn);
    return $countryName;
  }

  function getCaption($number){
    $conn = setConnection();
    $captions = getCaptionsHelper($conn);
    closeConnection($conn);
    return $captions[$number];

  }

  function getAverageRating($type) {
    $conn = setConnection();
    $ratings = getRatingsHelper($conn);
    closeConnection($conn);
    return $ratings[$type];

  }

  function getImage($number){
    $conn = setConnection();
    $images_paths = getImagesHelper($conn);
    closeConnection($conn);
    // echo getAverageRating("FOOD");
    return $images_paths[$number];

  }

  function getDescription($number){
    $conn = setConnection();
    $descriptions = getDescriptionsHelper($conn);
    closeConnection($conn);
    return $descriptions[$number];
  }

  function submitRating(){
    $category = fetchCategories();
    $countryCode = fetchCountryCode();
    $conn = setConnection();
    submitRatingsHelper($conn, $category, $countryCode);
    closeConnection($conn);
  }

  function getCountryCode(){
    if( isset($_GET["country"])) {
      $countryCode = $_GET["country"];
    }
    else {
      $countryCode = "stats";
    }
    return $countryCode;

  }


  function closeConnection($conn){
    $conn->close();
  }

?>
