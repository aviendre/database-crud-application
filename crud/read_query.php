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

        if (isset($_POST['get_all_data_from_user_id'])) {
            $user_id = $_POST['user_id'];

            // Run the SQL query to retrieve all user data based on user ID
            $sql = "SELECT * FROM users WHERE userid = '$user_id'";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Display the user data in a table
                echo "<table class='table'>";
                echo "<thead><tr><th>User ID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>City</th><th>State</th><th>Email</th><th>Phone</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['userid'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo "<td>" . $row['state'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                // Display a message if no rows were returned
                echo "No user data found for user ID: $user_id";
            }
        }

        if (isset($_POST['get_all_data_from_first_name'])) {
            $first_name = $_POST['first_name'];

            // Run the SQL query to retrieve all user data based on user ID
            $sql = "SELECT * FROM users WHERE firstname = '$first_name'";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Display the user data in a table
                echo "<table class='table'>";
                echo "<thead><tr><th>User ID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>City</th><th>State</th><th>Email</th><th>Phone</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['userid'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo "<td>" . $row['state'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                // Display a message if no rows were returned
                echo "No user data found for user first name: $first_name";
            }
        }

        if (isset($_POST['get_all_data_from_last_name'])) {
            $last_name = $_POST['last_name'];

            // Run the SQL query to retrieve all user data based on user ID
            $sql = "SELECT * FROM users WHERE lastname = '$last_name'";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Display the user data in a table
                echo "<table class='table'>";
                echo "<thead><tr><th>User ID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>City</th><th>State</th><th>Email</th><th>Phone</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['userid'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo "<td>" . $row['state'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                // Display a message if no rows were returned
                echo "No user data found for user last name: $last_name";
            }
        }

        if (isset($_POST['get_all_data_from_email'])) {
            $user_email = $_POST['email'];

            // Run the SQL query to retrieve all user data based on user ID
            $sql = "SELECT * FROM users WHERE email = '$user_email'";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Display the user data in a table
                echo "<table class='table'>";
                echo "<thead><tr><th>User ID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>City</th><th>State</th><th>Email</th><th>Phone</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['userid'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo "<td>" . $row['state'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                // Display a message if no rows were returned
                echo "No user data found for user email: $user_email";
            }
        }

        if (isset($_POST['get_all_data_from_options'])) {
            $_POST['first_name'] ? $first_name = $_POST['first_name'] : $first_name = "empty";
            $_POST['last_name'] ? $last_name = $_POST['last_name'] : $last_name = "empty";
            $_POST['email'] ? $user_email = mysqli_real_escape_string($conn, $_POST['email']) : $user_email = "empty";

            // Run the SQL query to retrieve all user data based on user ID
            $sql = "SELECT * FROM users WHERE firstname = '$first_name' OR lastname = '$last_name' OR email = '$user_email'";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Display the user data in a table
                echo "<table class='table'>";
                echo "<thead><tr><th>User ID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>City</th><th>State</th><th>Email</th><th>Phone</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['userid'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo "<td>" . $row['state'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                // Display a message if no rows were returned
                echo "No user data found for user first name: $first_name
                <br> No user data found for user last name: $last_name
                <br> No user data found for user email: $user_email";
            }
        }

        if (isset($_POST['get_purchases_from_user_id'])) {
            $user_id = $_POST['user_id'];

            // Run the SQL query to retrieve all user data based on user ID
            $sql = "select u.username, u.firstname, u.lastname, s.salesid, e.eventname
            from users u, sales s, event e 
            where s.buyerid = u.userid 
            and s.eventid = e.eventid
            and u.userid = '$user_id'";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Display the user data in a table
                echo "<table class='table'>";
                echo "<thead><tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Sales ID</th><th>Event Name</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['salesid'] . "</td>";
                    echo "<td>" . $row['eventname'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                // Display a message if no rows were returned
                echo "No user data found for user ID: $user_id";
            }
        }

        if (isset($_POST['get_purchases_from_user_id_on_date'])) {
            $user_id = $_POST['user_id'];
            $date = $_POST['date'];

            // Run the SQL query to retrieve all user data based on user ID
            $sql = "select u.firstname, u.lastname, s.salesid, e.eventname, d.caldate 
            from users u, sales s, date d, event e
            where s.buyerid = u.userid 
            and s.eventid = e.eventname
            and s.dateid = d.dateid 
            and u.userid = '$user_id'
            and d.caldate = '$date';";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Display the user data in a table
                echo "<table class='table'>";
                echo "<thead><tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Sales ID</th><th>Event Name</th><th>Date</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['salesid'] . "</td>";
                    echo "<td>" . $row['eventname'] . "</td>";
                    echo "<td>" . $row['caldate'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                // Display a message if no rows were returned
                echo "No user data found for user ID: $user_id
                <br> on $date";
            }
        }

        if (isset($_POST['get_purchases_from_user_id_and_year'])) {
            $user_id = $_POST['user_id'];
            $year = $_POST['year'];

            // Run the SQL query to retrieve all user data based on user ID
            $sql = "SELECT u.username, u.firstname, u.lastname, s.salesid, e.eventname, d.year 
            from users u, sales s, date d, event e
            where s.buyerid = u.userid 
            and s.eventid = e.eventid
            and s.dateid = d.dateid
            and u.userid = '$user_id' 
            and d.year = '$year';";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Display the user data in a table
                echo "<table class='table'>";
                echo "<thead><tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Sales ID</th><th>Event Name</th><th>Year</th></tr></thead>";
                echo "<tbody>";
                $counter = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['firstname'] . "</td>";
                    echo "<td>" . $row['lastname'] . "</td>";
                    echo "<td>" . $row['salesid'] . "</td>";
                    echo "<td>" . $row['eventname'] . "</td>";
                    echo "<td>" . $row['year'] . "</td>";
                    echo "</tr>";
                    $counter++;
                    if ($counter > 50)
                        break;
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                // Display a message if no rows were returned
                echo "No user data found for user ID: $user_id";
            }
        }

        if (isset($_POST['get_all_events_in_venue'])) {

            $venuename = $_POST['venuename'];

            // Run the SQL query to retrieve all user data based on user ID
            $sql = "select e.eventname, v.venuename 
            from event e, venue v 
            where e.venueid = v.venueid 
            and v.venuename = '$venuename';";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Display the user data in a table
                echo "<table class='table'>";
                echo "<thead><tr><th>Event Name</th><th>Venue Name</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['eventname'] . "</td>";
                    echo "<td>" . $row['venuename'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                // Display a message if no rows were returned
                echo "No data found for venue: $venuename";
            }
        }

        if (isset($_POST['get_all_events_and_venue'])) {
            // Run the SQL query to retrieve all user data based on user ID
            $sql = "SELECT *
            FROM venue v
            INNER JOIN event e ON e.venueid = v.venueid;";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Display the user data in a table
                echo "<table class='table'>";
                echo "<thead><tr><th>Event Name</th><th>Venue Name</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['eventname'] . "</td>";
                    echo "<td>" . $row['venuename'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            }
        }

        if (isset($_POST['get_tickets_in_venue'])) {

            $venuename = $_POST['venuename'];

            // Run the SQL query to retrieve all user data based on user ID
            $sql = "SELECT SUM(numtickets) as total_tickets,
            v.venuename as venue_name
            FROM listing l
            INNER JOIN event e ON e.eventid = l.eventid
            INNER JOIN venue v ON v.venueid = e.venueid
            WHERE v.venuename = '$venuename';";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Display the user data in a table
                echo "<table class='table'>";
                echo "<thead><tr><th>Tickets</th><th>Venue Name</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['total_tickets'] . "</td>";
                    echo "<td>" . $row['venue_name'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                // Display a message if no rows were returned
                echo "No data found for venue: $venuename";
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