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

        if (isset($_POST['update_price'])) {
            // Get form data
            $venue_name = mysqli_real_escape_string($conn, $_POST['venue_name']);
            $month = mysqli_real_escape_string($conn, $_POST['month']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);

            // Get venue id from venue name
            $query = "SELECT venueid FROM venue WHERE venuename = '$venue_name'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $venue_id = $row['venueid'];

                // Get date id from month
                $query = "SELECT dateid FROM date WHERE month = '$month'";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $date_id = $row['dateid'];

                    // Update event price
                    $query = "UPDATE listing 
                    SET priceperticket = $price 
                    WHERE eventid IN 
                        (SELECT eventid 
                        FROM event 
                        WHERE venueid = $venue_id 
                        AND dateid = $date_id)";
                    $result = mysqli_query($conn, $query);

                    // Check if query is successful
                    if ($result) {
                        echo "Price updated successfully!";
                    } else {
                        echo "Error updating price: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error: Date not found.";
                }
            } else {
                echo "Error: Venue not found.";
            }
        }

        if (isset($_POST['update_price_specific_event'])) {
            // Get the form data
            $event_name = $_POST['event_name'];
            $new_price = $_POST['new_price'];

            // Run the SQL query to update the listing with the new price and total price
            $sql = "UPDATE listing 
            SET priceperticket = $new_price, totalprice = numtickets * $new_price 
            WHERE eventid = (SELECT eventid 
                            FROM event 
                            WHERE eventname = '$event_name');";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if the query was successful
            if ($result) {
                // Display a success message
                echo "Listing updated successfully!";
            } else {
                // Display an error message
                echo "Error updating listing: " . mysqli_error($conn);
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