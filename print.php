<?php
include 'database.php';

echo "<h1>Results</h1>";



// define variables and set to empty values
$bikes = $date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $bikes = test_input($_POST["bikes"]);
  $date = test_input($_POST["date"]);
  insertBooking($date, $bikes);

  echo "<pre>" . $date . ": " . $bikes . "bikes requested" . "</pre>";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>