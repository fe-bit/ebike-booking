<?php

$pdo = new PDO('mysql:host=localhost;dbname=ebike_bookings;charset=utf8', 'bookingManager', 'addjsdfe093');




function getEntry() {
    $database = [
        [date("2022/10/5"), 2],
        [date("2022/10/6"), 10],
    ];
    return $database;
  }

function getAllBookings(){
    $pdo = new PDO('mysql:host=localhost;dbname=ebike_bookings;charset=utf8', 'bookingManager', 'addjsdfe093');
    $sql = "SELECT date, bikes FROM booking";
    return $pdo->query($sql);
}

function insertBooking($date, $bikes){
    $pdo = new PDO('mysql:host=localhost;dbname=ebike_bookings;charset=utf8', 'bookingManager', 'addjsdfe093');
    $statement = $pdo->prepare("INSERT INTO booking (date, bikes) VALUES (?, ?)");
    $statement->execute(array($date, $bikes));    
}
?>
