<!doctype html>
<html lang="en">

<head>
    <title>eBikes buchen</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="container">
        <div class="jumbotron">
            <form method="post">

                <div class="form-group">
                    <label for="bikePicker">Wie viele eBikes brauchen Sie?</label>
                    <input type="number" name="bikes" id="bikePicker" class="form-control"
                        placeholder="Anzahl an eBikes..." aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Geben Sie an wie viele eBikes Sie an diesem Tage
                        brauchen</small>
                </div>
                <div class="form-group">
                    <label for="datePicker">Wählen Sie ein Datum</label>
                    <input type="date" name="date" id="datePicker" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
                <input type="submit" class="btn btn-warning" value="Buchen">
            </form>
        </div>
        
            <?php   
                include 'database.php';             
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $bikes = test_input($_POST["bikes"]);
                  $date = test_input($_POST["date"]);
                  $success = insertBooking($date, $bikes);
                  switch($success){
                      case BookingStatus::Success: 
                        echo '<div class="jumbotron bg-success">'; 
                        echo "<h4 class='text-center font-weight-normal'>Sie haben " . $bikes . " eBikes für den " . $date . " gebucht!</h4>";
                        echo '</div>';
                        break;
                    case BookingStatus::Duplicate:
                        echo '<div class="jumbotron bg-info">'; 
                        echo "<h4 class='text-center font-weight-normal'>Sie haben bereits eine Buchung für den " . $date . " vorgenommen.
                        Passen Sie die Buchung unter <em>Meine Buchungen</em> an</h4>";
                        echo '</div>'; 
                        break;
                    case BookingStatus::Error:
                        echo '<div class="jumbotron bg-danger">'; 
                        echo "<h4 class='text-center font-weight-normal'>Der Buchungsvorgang war leider nicht erfolgreich. Versuchen Sie
                        es nochmal. Falls das Problem besteht, kontaktieren Sie den Kundenservice.</h4>";
                        echo '</div>'; 
                  }                                                 
                }
                
                function test_input($data) {
                  $data = trim($data);
                  $data = stripslashes($data);
                  $data = htmlspecialchars($data);
                  return $data;
                }
            ?>
        
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script>
        console.log("works")
        //document.getElementById('datePicker').value = new Date().toDateInputValue();
        const today = new Date()
        const tomorrow = new Date(today)
        tomorrow.setDate(tomorrow.getDate() + 1)

        document.getElementById('datePicker').valueAsDate = tomorrow;
    </script>
</body>

</html>