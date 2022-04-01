<!doctype html>
<html lang="en">

<head>
    <title>Meine Buchungen</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="text-center">
        <h1>Meine Buchungen</h1>
        <small>Buchungen für den folgenden Tag sind bis 15:00 Uhr anpassbar.</small>
    </div>

    <div class="container">
        <div class="">
            <form class="form-inline m-2" method="get">
                <div class="form-group mr-2">
                    <label for="selectYear" class="mr-1">Jahr</label>
                    <select id="selectYear" class="form-control" name="year">
                        <option selected>2022</option>
                        <option>2023</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selectMonth" class="mr-1">Monat</label>
                    <select id="selectMonth" class="form-control" name="month">
                        <option value="1">Januar</option>
                        <option value="2">Februar</option>
                        <option value="3">M&auml;rz</option>
                        <option value="4">April</option>
                        <option value="5" selected>Mai</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Dezember</option>
                    </select>
                </div>
                <input class="btn btn-info mr-2 ml-2" type="submit" value="Suchen" />
            </form>

            <table class="table table-sm table-secondary">
                <thead class="">
                    <tr>
                        <th>Datum</th>
                        <th>Gebuchte eBikes</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //set year and date and give them as params to database
                    
                    include 'database.php';
                    $entry = getEntry();
                    $entry = getAllBookings();
                    foreach ($entry as $en) {
                        echo '<tr>
                            <td scope="row">' . $en[0] . '</td>
                            <td>' . $en[1] . '</td>
                            <td><a class="btn btn-primary" href="#">Bearbeiten</button></td>
                            </tr>';
                    }


                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>