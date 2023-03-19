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
        <button onclick="goToDatabase()">Go back to database</button>
    </div>

</body>
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
<script>
    function goToDatabase() {
        window.location.href = "database.php";
    }
</script>

</html>

<?php
require_once("db_conn.php");

if (isset($_POST['populate_users'])) {
    $start_time = microtime(true);
    $file = fopen("allusers_pipe.txt", "r") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        $data = explode("|", $line);
        $userid = $data[0];
        $username = $data[1];
        $firstname = $data[2];
        $lastname = $data[3];
        $city = $data[4];
        $state = $data[5];
        $email = $data[6];
        $phone = $data[7];
        $likesports = $data[8] == "" ? null : $data[8];
        $liketheatre = $data[9] == "" ? null : $data[9];
        $likeconcerts = $data[10] == "" ? null : $data[10];
        $likejazz = $data[11] == "" ? null : $data[11];
        $likeclassical = $data[12] == "" ? null : $data[12];
        $likeopera = $data[13] == "" ? null : $data[13];
        $likerock = $data[14] == "" ? null : $data[14];
        $likevegas = $data[15] == "" ? null : $data[15];
        $likebroadway = $data[16] == "" ? null : $data[16];
        $likemusicals = $data[17] == "" ? null : $data[17];
        $sql = "INSERT INTO users (userid, username, firstname, lastname, city, state, email, phone, likesports, liketheatre, likeconcerts, likejazz, likeclassical, likeopera, likerock, likevegas, likebroadway, likemusicals) VALUES ('$userid', '$username', '$firstname', '$lastname', '$city', '$state', '$email', '$phone', '$likesports', '$liketheatre', '$likeconcerts', '$likejazz', '$likeclassical', '$likeopera', '$likerock', '$likevegas', '$likebroadway', '$likemusicals')";
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    fclose($file);
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
    echo "Users populated successfully!";
}

if (isset($_POST['populate_venue'])) {
    $start_time = microtime(true);
    $file = fopen("venue_pipe.txt", "r") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        $data = explode("|", $line);
        $venueid = mysqli_real_escape_string($conn, $data[0]);
        $venuename = mysqli_real_escape_string($conn, $data[1]);
        $venuecity = mysqli_real_escape_string($conn, $data[2]);
        $venuestate = mysqli_real_escape_string($conn, $data[3]);
        $venueseats = mysqli_real_escape_string($conn, $data[4]);
        $sql = "INSERT INTO venue (venueid, venuename, venuecity, venuestate, venueseats) VALUES ('$venueid', '$venuename', '$venuecity', '$venuestate', '$venueseats')";
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    fclose($file);
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
    echo "Venue populated successfully!";
}

if (isset($_POST['populate_date'])) {
    $start_time = microtime(true);
    $file = fopen("date2008_pipe.txt", "r") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        $data = explode("|", $line);
        $dateid = mysqli_real_escape_string($conn, $data[0]);
        $caldate = mysqli_real_escape_string($conn, $data[1]);
        $day = mysqli_real_escape_string($conn, $data[2]);
        $week = mysqli_real_escape_string($conn, $data[3]);
        $month = mysqli_real_escape_string($conn, $data[4]);
        $qtr = mysqli_real_escape_string($conn, $data[5]);
        $year = mysqli_real_escape_string($conn, $data[6]);
        $holiday = mysqli_real_escape_string($conn, $data[7]);
        $sql = "INSERT INTO date (dateid, caldate, day, week, month,qtr,year,holiday) VALUES ('$dateid', '$caldate', '$day', '$week', '$month', '$qtr', '$year', '$holiday')";
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    fclose($file);
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
    echo "Date populated successfully!";
}

if (isset($_POST['populate_category'])) {
    $start_time = microtime(true);
    $file = fopen("category_pipe.txt", "r") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        $data = explode("|", $line);
        $catid = mysqli_real_escape_string($conn, $data[0]);
        $catgroup = mysqli_real_escape_string($conn, $data[1]);
        $catname = mysqli_real_escape_string($conn, $data[2]);
        $catdesc = mysqli_real_escape_string($conn, $data[3]);
        $sql = "INSERT INTO category (catid, catgroup, catname, catdesc) VALUES ('$catid', '$catgroup', '$catname', '$catdesc')";
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    fclose($file);
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
    echo "Category populated successfully!";
}

if (isset($_POST['populate_event'])) {
    $start_time = microtime(true);
    $file = fopen("allevents_pipe.txt", "r") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        $data = explode("|", $line);
        $eventid = mysqli_real_escape_string($conn, $data[0]);
        $venueid = mysqli_real_escape_string($conn, $data[1]);
        $catid = mysqli_real_escape_string($conn, $data[2]);
        $dateid = mysqli_real_escape_string($conn, $data[3]);
        $eventname = mysqli_real_escape_string($conn, $data[4]);
        $starttime = mysqli_real_escape_string($conn, $data[5]);
        $sql = "INSERT INTO event (eventid, venueid, catid, dateid,eventname,starttime) VALUES ('$eventid', '$venueid', '$catid', '$dateid','$eventname','$starttime')";
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    fclose($file);
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
    echo "Events populated successfully!";
}

if (isset($_POST['populate_listing'])) {
    $start_time = microtime(true);
    $file = fopen("listings_pipe.txt", "r") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        $data = explode("|", $line);
        $listid = mysqli_real_escape_string($conn, $data[0]);
        $sellerid = mysqli_real_escape_string($conn, $data[1]);
        $eventid = mysqli_real_escape_string($conn, $data[2]);
        $dateid = mysqli_real_escape_string($conn, $data[3]);
        $numtickets = mysqli_real_escape_string($conn, $data[4]);
        $priceperticket = mysqli_real_escape_string($conn, $data[5]);
        $totalprice = mysqli_real_escape_string($conn, $data[6]);
        $listtime = mysqli_real_escape_string($conn, $data[7]);
        $sql = "INSERT INTO listing (listid, sellerid, eventid, dateid,numtickets,priceperticket,totalprice,listtime) VALUES ('$listid', '$sellerid', '$eventid', '$dateid','$numtickets','$priceperticket','$totalprice','$listtime')";
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    fclose($file);
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
    echo "Listing populated successfully!";
}

if (isset($_POST['populate_sales'])) {
    $start_time = microtime(true);
    $file = fopen("sales_tab.txt", "r") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        $data = explode("|", $line);
        $salesid = mysqli_real_escape_string($conn, $data[0]);
        $listid = mysqli_real_escape_string($conn, $data[1]);
        $sellerid = mysqli_real_escape_string($conn, $data[2]);
        $buyerid = mysqli_real_escape_string($conn, $data[3]);
        $eventid = mysqli_real_escape_string($conn, $data[4]);
        $dateid = mysqli_real_escape_string($conn, $data[5]);
        $qtysold = mysqli_real_escape_string($conn, $data[6]);
        $pricepaid = mysqli_real_escape_string($conn, $data[7]);
        $commission = mysqli_real_escape_string($conn, $data[8]);
        $saletime = mysqli_real_escape_string($conn, $data[9]);

        $sql = "INSERT INTO sales (salesid, listid, sellerid, buyerid,eventid,
        dateid,qtysold,pricepaid,commission,saletime) 
        VALUES
         ('$salesid', '$listid', '$sellerid', '$buyerid','$eventid',
         '$dateid','$qtysold','$pricepaid','$commission','$saletime')";

        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    fclose($file);
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
    echo "Sales populated successfully!";
}
?>