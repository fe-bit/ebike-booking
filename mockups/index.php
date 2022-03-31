<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<div class="container">
 <nav class="nav justify-content-center">
     <a class="nav-link active" href="#">Request Bikes</a>
     <a class="nav-link" href="#">My Requests</a>    
     <a class="nav-link" href="#">My Calendar</a>     
 </nav>
</div>
    <h1>This is a Mockup</h1>

    <div class="container">
        <div class="jumbotron">
            <form method="post">

                <div class="form-group">
                    <label for="bikePicker">How many Bikes do you need?</label>
                    <input type="number" name="bikes" id="bikePicker" class="form-control" placeholder="number of bikes..."
                        aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Select the number of bikes you expect to rent for this day</small>
                </div>
                <div class="form-group">
                    <label for="datePicker">Please select a date</label>
                    <input type="date" name="date" id="datePicker" class="form-control" placeholder=""
                        aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Tomorrow is the default option</small>
                </div>
                <input type="submit" value="Request Bikes">
            </form>
        </div>   
        
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