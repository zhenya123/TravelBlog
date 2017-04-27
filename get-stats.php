<?php


function getRatingsHelperStats($conn, $category) {
  $ratings = array();
  $sql = "SELECT country_name, avg(rating) as average_rating
  FROM Rating_Categories rc NATURAL JOIN RATINGS r NATURAL JOIN COUNTRIES c
  WHERE category_name = '" . $category . "'
  GROUP BY category_name, country_name";
  $result  = $conn->query($sql);
  while ($row = $result->fetch_assoc()){
    $ratings[$row['country_name']] = $row['average_rating'];
  }
  return $ratings;
}

function getWealth(){
  $conn = setConnection();
  $ratings = getRatingsHelperStats($conn, "WEALTH");
  closeConnection($conn);
  return array_values($ratings);
}

function getFood(){
  $conn = setConnection();
  $ratings = getRatingsHelperStats($conn, "FOOD");
  closeConnection($conn);
  return array_values($ratings);
}

function getHospitality(){
  $conn = setConnection();
  $ratings = getRatingsHelperStats($conn, "HOSPITALITY");
  closeConnection($conn);
  return array_values($ratings);
}

function getSafety(){
  $conn = setConnection();
  $ratings = getRatingsHelperStats($conn, "SAFETY");
  closeConnection($conn);
  return array_values($ratings);
}

function getCountries(){
  $conn = setConnection();
  $ratings = getRatingsHelperStats($conn, "HOSPITALITY");
  closeConnection($conn);
  return array_keys($ratings);
}

// function getCountryCodeFromName(){
//   $conn = setConnection();
//   $countryCode = "Error";
//   $name = "Error";
//   if(isset($_POST['category']))
//   {
//     $name = $_POST['category'];
//   }
//   $sql = "SELECT country_code
//   FROM COUNTRIES
//   WHERE country_name = '" . $name . "'";
//   $result  = $conn->query($sql);
//   while ($row = $result->fetch_assoc()){
//     $countryCode = $row['country_code'];
//   }
//   closeConnection($conn);
//   return $countryCode;
//
// }



?>
