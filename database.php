<?php

$pdo = new PDO('mysql:host=localhost;dbname=ebike_bookings;charset=utf8', 'bookingManager', 'addjsdfe093');

enum BookingStatus
{
    case Success;
    case Duplicate;
    case Error;
}


function getEntry() {
    $database = [
        [date("2022/10/5"), 2],
        [date("2022/10/6"), 10],
    ];
    return $database;
  }

function getAllBookings($year, $month){
    $pdo = new PDO('mysql:host=localhost;dbname=ebike_bookings;charset=utf8', 'bookingManager', 'addjsdfe093');
    $sql = "SELECT date_of_booking, bikes FROM booking WHERE YEAR(date_of_booking)='" . $year . "' AND MONTH(date_of_booking)='" . $month . "';";
    return $pdo->query($sql);
}

function date_is_already_in_booking($pdo, $date){
    $sql ="SELECT date_of_booking, Count(id) FROM booking WHERE date_of_booking='" . $date . "' GROUP BY date_of_booking;";
    $count = $pdo->query($sql);
    return $count->rowCount()!=0;
}

function insertBooking($date, $bikes){
    
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=ebike_bookings;charset=utf8', 'bookingManager', 'addjsdfe093');
        if (date_is_already_in_booking($pdo, $date)){
            return BookingStatus::Duplicate;
        }
        $statement = $pdo->prepare("INSERT INTO booking (date_of_booking, bikes) VALUES (?, ?)");
        $statement->execute(array($date, $bikes)); 
        return BookingStatus::Success;
    }
    catch (Exception $e){
        return BookingStatus::Error;
    }    
}
