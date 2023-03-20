<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD</title>
</head>

<body>
    <div>
        <?php
        require_once("db_conn.php");
        echo "<br>";
        $start_time = microtime(true);

        // Check if the form has been submitted
        if (isset($_POST['create_new_user'])) {
            // Get the form data
            $username = $_POST["username"];
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $likesports = isset($_POST["likesports"]) ? 1 : 0;
            $liketheatre = isset($_POST["liketheatre"]) ? 1 : 0;
            $likeconcerts = isset($_POST["likeconcerts"]) ? 1 : 0;
            $likejazz = isset($_POST["likejazz"]) ? 1 : 0;
            $likeclassical = isset($_POST["likeclassical"]) ? 1 : 0;
            $likeopera = isset($_POST["likeopera"]) ? 1 : 0;
            $likerock = isset($_POST["likerock"]) ? 1 : 0;
            $likevegas = isset($_POST["likevegas"]) ? 1 : 0;
            $likebroadway = isset($_POST["likebroadway"]) ? 1 : 0;
            $likemusicals = isset($_POST["likemusicals"]) ? 1 : 0;

            // Prepare the SQL statement
            $sql = "INSERT INTO users ( username, firstname, lastname, city, state, email, phone, likesports, liketheatre, likeconcerts, likejazz, likeclassical, likeopera, likerock, likevegas, likebroadway, likemusicals) 
            VALUES ('$username', '$firstname', '$lastname', '$city', '$state', '$email', '$phone', '$likesports', '$liketheatre', '$likeconcerts', '$likejazz', '$likeclassical', '$likeopera', '$likerock', '$likevegas', '$likebroadway', '$likemusicals')";

            // Execute the SQL statement
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        if (isset($_POST['create_new_listing'])) {
            $sellername = $_POST['sellername'];
            $eventname = $_POST['eventname'];
            $date = $_POST['date'];
            $numtickets = $_POST['numtickets'];
            $priceperticket = $_POST['priceperticket'];
            $totalprice = $_POST['totalprice'];
            $listtime = $_POST['listtime'];

            // Insert the new listing into the database
            $query = "INSERT INTO listing (sellerid, eventid, dateid, numtickets, priceperticket, totalprice, listtime)
                        VALUES ((SELECT userid FROM users 
                                WHERE username = '$sellername'),
                                (SELECT eventid FROM event 
                                WHERE eventname = '$eventname' 
                                AND dateid = (SELECT dateid 
                                                FROM date 
                                                WHERE caldate = '$date')),
                                (SELECT dateid FROM date 
                                WHERE caldate = '$date'),
                                '$numtickets',
                                '$priceperticket',
                                '$totalprice',
                                '$listtime')";
            $result = $mysqli->query($query);

            // Check if the insert was successful
            if ($result) {
                echo "Listing created successfully!";
            } else {
                echo "Error: " . $mysqli->error;
            }
        }

        if (isset($_POST['create_new_venue'])) {
            // Get form data
            $venuename = $_POST['venuename'];
            $venuecity = $_POST['venuecity'];
            $venuestate = $_POST['venuestate'];
            $venueseats = $_POST['venueseats'];

            // Insert new venue into database
            $query = "INSERT INTO venue (venuename, venuecity, venuestate, venueseats) 
              VALUES ('$venuename', '$venuecity', '$venuestate', '$venueseats')";
            $result = mysqli_query($conn, $query);

            // Check if query is successful
            if ($result) {
                echo "New venue added successfully!";
            } else {
                echo "Error adding new venue: " . mysqli_error($conn);
            }
        }
        $end_time = microtime(true);
        $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
        echo "<br> Function completed in $execution_time ms";
        ?>
    </div>



</body>
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</html>