<?php




function SetUpDatabase()
{
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "ebike_bookings";
    $pdo = new PDO("mysql:host=localhost", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $dbname = "`" . str_replace("`", "``", $dbname) . "`";
    $pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->query("use $dbname");
}

function GetDbConnection()
{
    return new PDO('mysql:host=localhost;dbname=ebike_bookings;charset=utf8', 'root', '');
}

function setUpTable()
{
    try {
        $sql = "CREATE TABLE IF NOT EXISTS `booking` (
            `id` INT AUTO_INCREMENT NOT NULL,
            `bikes` INT NOT NULL,
            `date_of_booking` DATE NOT NULL,
            PRIMARY KEY (id)
          );";
        $pdo = GetDbConnection();
        $pdo->query($sql);
    } catch (Exception $e) {
        echo $e;
    }
}


SetUpDatabase();
setUpTable();

enum BookingStatus
{
    case Success;
    case Duplicate;
    case Error;
    case InvalidDateOrNumber;
}


function getAllBookings($year, $month)
{
    $pdo = GetDbConnection(); //new PDO('mysql:host=localhost;dbname=ebike_bookings;charset=utf8', 'bookingManager', 'addjsdfe093');
    $sql = "SELECT date_of_booking, bikes FROM booking WHERE YEAR(date_of_booking)='" . $year . "' AND MONTH(date_of_booking)='" . $month . "' ORDER BY date_of_booking ASC;";
    return $pdo->query($sql);
}

function date_is_already_in_booking($pdo, $date)
{
    $sql = "SELECT date_of_booking, Count(id) FROM booking WHERE date_of_booking='" . $date . "' GROUP BY date_of_booking;";
    $count = $pdo->query($sql);
    return $count->rowCount() != 0;
}

function is_valid_input($bikes, $date)
{
    try {
        $bikes_number = (int)$bikes;
        if ($bikes != $bikes_number) {
            return false; //bikes is not an integer
        }
        if ($bikes_number <= 0) {
            return false;
        }
        $today = new DateTime();
        $date_d = new DateTime($date);
        if ($today > $date_d) {
            return false;
        }
        return true;
    } catch (Exception $e) {
        return (false);
    }
}

function insertBooking($date, $bikes)
{
    try {
        if (!Is_valid_input($bikes, $date)) {
            return BookingStatus::InvalidDateOrNumber;
        }
        $pdo = GetDbConnection(); //new PDO('mysql:host=localhost;dbname=ebike_bookings;charset=utf8', 'bookingManager', 'addjsdfe093');
        if (date_is_already_in_booking($pdo, $date)) {
            return BookingStatus::Duplicate;
        }
        $statement = $pdo->prepare("INSERT INTO booking (date_of_booking, bikes) VALUES (?, ?)");
        $statement->execute(array($date, $bikes));
        return BookingStatus::Success;
    } catch (Exception $e) {
        return BookingStatus::Error;
    }
}
