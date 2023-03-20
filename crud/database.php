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
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        PHP CRUD Database
    </nav>

    <div>
        <?php
        include "db_conn.php";
        ?>
    </div>

    <div name="create-tables">
        <h2>
            Create tables
        </h2>
        <div>
            <br>
            <form action="create_tables.php" method="post">
                <button type="submit" name="create_user_table">Create user table</button>
            </form>
        </div>

        <div>
            <br>
            <form action="create_tables.php" method="post">
                <button type="submit" name="create_venue_table">Create venue table</button>
            </form>
        </div>

        <div>
            <br>
            <form action="create_tables.php" method="post">
                <button type="submit" name="create_category_table">Create category table</button>
            </form>
        </div>

        <div>
            <br>
            <form action="create_tables.php" method="post">
                <button type="submit" name="create_date_table">Create date table</button>
            </form>
        </div>

        <div>
            <br>
            <form action="create_tables.php" method="post">
                <button type="submit" name="create_event_table">Create event table</button>
            </form>
        </div>

        <div>
            <br>
            <form action="create_tables.php" method="post">
                <button type="submit" name="create_listing_table">Create listing table</button>
            </form>
        </div>

        <div>
            <br>
            <form action="create_tables.php" method="post">
                <button type="submit" name="create_sale_table">Create sale table</button>
            </form>
        </div>

        <div>
            <br>
            <form action="create_tables.php" method="post">
                <button type="submit" name="create_all_table">Create all table</button>
            </form>
        </div>
    </div>


    <div>
        <br>
        <h2>Tables in the database</h2>
        <?php
        $sql = "SHOW TABLES";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>" . $row["Tables_in_$dbname"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "0 results";
        }

        ?>
    </div>

    <div>
        <div>
            <br>
            <h2>
                Populate data
            </h2>
            <form action="populate_tables.php" method="post">
                <button type="submit" name="populate_users">Populate Users</button>
            </form>
        </div>

        <div>
            <br>
            <form action="populate_tables.php" method="post">
                <button type="submit" name="populate_venue">Populate Venue</button>
            </form>
        </div>

        <div>
            <br>
            <form action="populate_tables.php" method="post">
                <button type="submit" name="populate_category">Populate category</button>
            </form>
        </div>

        <div>
            <br>
            <form action="populate_tables.php" method="post">
                <button type="submit" name="populate_date">Populate date</button>
            </form>
        </div>

        <div>
            <br>
            <form action="populate_tables.php" method="post">
                <button type="submit" name="populate_event">Populate event</button>
            </form>
        </div>

        <div>
            <br>
            <form action="populate_tables.php" method="post">
                <button type="submit" name="populate_listing">Populate listings</button>
            </form>
        </div>

        <div>
            <br>
            <form action="populate_tables.php" method="post">
                <button type="submit" name="populate_sales">Populate sales</button>
            </form>
        </div>
    </div>

    <div>
        <br>
        <h2>
            View Tables
        </h2>
        <button onclick="goToUser()">Go to user table</button>
    </div>

    <div>
        <br>
        <button onclick="goToVenue()">Go to venue table</button>
    </div>

    <div>
        <br>
        <button onclick="goToCategory()">Go to category table</button>
    </div>

    <div>
        <br>
        <button onclick="goToDate()">Go to date table</button>
    </div>

    <div>
        <br>
        <button onclick="goToEvent()">Go to event table</button>
    </div>

    <div>
        <br>
        <button onclick="goToListing()">Go to listing table</button>
    </div>

    <div>
        <br>
        <button onclick="goToSales()">Go to sale table</button>
    </div>

    <div>
        <br>
        <h2>
            Create Operation
        </h2>
        <div class="user">
            <h2>Add New User</h2>
            <form method="post" action="create_query.php">

                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required><br><br>

                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" required><br><br>

                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" id="lastname" required><br><br>

                <label for="city">City:</label>
                <input type="text" name="city" id="city" required><br><br>

                <label for="state">State:</label>
                <input type="text" name="state" id="state" required><br><br>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required><br><br>

                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" required><br><br>

                <p>Select the types of events you like:</p>

                <label for="likesports">Sports:</label>
                <input type="checkbox" name="likesports" id="likesports"><br>

                <label for="liketheatre">Theatre:</label>
                <input type="checkbox" name="liketheatre" id="liketheatre"><br>

                <label for="likeconcerts">Concerts:</label>
                <input type="checkbox" name="likeconcerts" id="likeconcerts"><br>

                <label for="likejazz">Jazz:</label>
                <input type="checkbox" name="likejazz" id="likejazz"><br>

                <label for="likeclassical">Classical:</label>
                <input type="checkbox" name="likeclassical" id="likeclassical"><br>

                <label for="likeopera">Opera:</label>
                <input type="checkbox" name="likeopera" id="likeopera"><br>

                <label for="likerock">Rock:</label>
                <input type="checkbox" name="likerock" id="likerock"><br>

                <label for="likevegas">Vegas:</label>
                <input type="checkbox" name="likevegas" id="likevegas"><br>

                <label for="likebroadway">Broadway:</label>
                <input type="checkbox" name="likebroadway" id="likebroadway"><br>

                <label for="likemusicals">Musicals:</label>
                <input type="checkbox" name="likemusicals" id="likemusicals"><br><br>

                <input type="submit" name="create_new_user" value="Add User">
            </form>
        </div>

        <div class="listing">
            <h3>Create a new listing</h3>
            <form method="POST" action="create_query.php">
                <label>Seller Name:</label>
                <input type="text" name="sellername"><br><br>

                <label>Event Name:</label>
                <input type="text" name="eventname"><br><br>

                <label>Date:</label>
                <input type="date" name="date"><br><br>

                <label>Number of Tickets:</label>
                <input type="number" name="numtickets"><br><br>

                <label>Price per Ticket:</label>
                <input type="number" name="priceperticket" step="0.01"><br><br>

                <label>Total Price:</label>
                <input type="number" name="totalprice" step="0.01"><br><br>

                <label>List Time:</label>
                <input type="datetime-local" name="listtime"><br><br>

                <input type="submit" name="create_new_listing" value="Create Listing">
            </form>
        </div>

        <div class="venue">
            <h3>Create a new venue</h3>
            <form action="create_query.php" method="post">
                <label for="venuename">Venue Name:</label>
                <input type="text" id="venuename" name="venuename"><br><br>

                <label for="venuecity">City:</label>
                <input type="text" id="venuecity" name="venuecity"><br><br>

                <label for="venuestate">State:</label>
                <input type="text" id="venuestate" name="venuestate" maxlength="2"><br><br>

                <label for="venueseats">Number of Seats:</label>
                <input type="number" id="venueseats" name="venueseats"><br><br>

                <input type="submit" name="create_new_venue" value="Add Venue">
            </form>
        </div>
    </div>

    <div>
        <br>
        <div>
            <h2>
                Read Operation
            </h2>
            <h3>Get user via user ID</h3>
            <form method="post" action="read_query.php">
                <label for="user_id">Enter User ID:</label>
                <input type="text" id="user_id" name="user_id">
                <input type="submit" name="get_all_data_from_user_id" value="Find">
            </form>
        </div>
        <div>
            <h3>Get user via first name</h3>
            <form method="post" action="read_query.php">
                <label for="first_name">Enter First Name:</label>
                <input type="text" id="first_name" name="first_name">
                <input type="submit" name="get_all_data_from_first_name" value="Find">
            </form>
        </div>
        <div>
            <h3>Get user via last name</h3>
            <form method="post" action="read_query.php">
                <label for="last_name">Enter Last Name:</label>
                <input type="text" id="last_name" name="last_name">
                <input type="submit" name="get_all_data_from_last_name" value="Find">
            </form>
        </div>
        <div>
            <h3>Get user via email</h3>
            <form method="post" action="read_query.php">
                <label for="email">Enter Email:</label>
                <input type="text" id="email" name="email">
                <input type="submit" name="get_all_data_from_email" value="Find">
            </form>
        </div>
        <div>
            <h3>Get user via first name or last name or email</h3>
            <form method="post" action="read_query.php">

                <label for="first_name">Enter First Name:</label>
                <input type="text" id="first_name" name="first_name">
                <br><br>
                <label for="last_name">Enter Last Name:</label>
                <input type="text" id="last_name" name="last_name">
                <br><br>
                <label for="email">Enter Email:</label>
                <input type="text" id="email" name="email">
                <br><br>
                <input type="submit" name="get_all_data_from_options" value="Find">
            </form>
        </div>
        <div>
            <h3>Get user purchases via user ID</h3>
            <form method="post" action="read_query.php">
                <label for="user_id">Enter user ID:</label>
                <input type="text" id="user_id" name="user_id">
                <input type="submit" name="get_purchases_from_user_id" value="Find">
            </form>
        </div>
        <div>
            <h3>Get user purchases via date</h3>
            <form method="post" action="read_query.php ">
                <label for="user_id">User ID:</label>
                <input type="text" name="user_id" id="user_id">

                <label for="date">Date:</label>
                <input type="date" name="date" id="date">

                <button type="submit" name="get_purchases_from_user_id_on_date">Get Purchases</button>
            </form>

        </div>
        <div>
            <h3>Get user purchases via year</h3>
            <form method="post" action="read_query.php">
                <label for="user_id">Enter user ID:</label>
                <input type="text" name="user_id" id="user_id"><br><br>

                <label for="year">Enter year:</label>
                <input type="text" name="year" id="year"><br><br>
                <button type="submit" name="get_purchases_from_user_id_and_year">Get Purchases</button>
            </form>

        </div>
        <div>
            <h3>Get event from venue</h3>
            <form method="post" action="read_query.php">
                <label for="venuename">Enter Venue name:</label>
                <input type="text" id="venuename" name="venuename">
                <input type="submit" name="get_all_events_in_venue" value="Find">
            </form>
        </div>
        <div>
            <h3>Get event and venue</h3>
            <form method="post" action="read_query.php">
                <input type="submit" name="get_all_events_and_venue" value="Get">
            </form>
        </div>
        <div>
            <h3>Get total number of tickers in venue</h3>
            <form method="post" action="read_query.php">
                <label for="venuename">Enter Venue name:</label>
                <input type="text" id="venuename" name="venuename">
                <input type="submit" name="get_tickets_in_venue" value="Find">
            </form>
        </div>
    </div>

    <div>
        <br>
        <h2>
            Update Operation
        </h2>

        <h3>Update ticket pricing for an event </h3>
        <form method="POST" action="update_query.php">
            <label for="event_name">Event Name:</label>
            <input type="text" name="event_name" required><br><br>
            <label for="new_price">New Price:</label>
            <input type="number" name="new_price" required><br><br>
            <button type="submit" name="update_price_specific_event">Update Listing</button>
        </form>

        <h3>Update Listing Price of All Events in the Venue on a Specific Month</h3>
        <form method="POST" action="update_query.php">
            <label for="venue_name">Venue Name:</label>
            <input type="text" id="venue_name" name="venue_name" required><br><br>

            <label for="month">Month:</label>
            <select name="month" id="month">
                <option value="JAN">January</option>
                <option value="FEB">February</option>
                <option value="MAR">March</option>
                <option value="APR">April</option>
                <option value="MAY">May</option>
                <option value="JUN">June</option>
                <option value="JUL">July</option>
                <option value="AUG">August</option>
                <option value="SEP">September</option>
                <option value="OCT">October</option>
                <option value="NOV">November</option>
                <option value="DEC">December</option>
            </select><br><br>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required><br><br>

            <button type="submit" name="update_price">Update Price</button>
        </form>
    </div>

    <div>
        <br>
        <h2>
            Delete Operation
        </h2>
        <form method="post" action="delete_query.php">
            <label for="seller_id">Enter Seller ID:</label>
            <input type="text" id="seller_id" name="seller_id">
            <input type="submit" name="delete_data" value="Delete Seller Data">
        </form>
    </div>

</body>
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

<script>
    function goToUser() {
        window.location.href = "user_table.php";
    }
    function goToVenue() {
        window.location.href = "venue_table.php";
    }
    function goToCategory() {
        window.location.href = "category_table.php";
    }
    function goToDate() {
        window.location.href = "date_table.php";
    }
    function goToEvent() {
        window.location.href = "event_table.php";
    }
    function goToListing() {
        window.location.href = "listing_table.php";
    }
    function goToSales() {
        window.location.href = "sales_table.php";
    }
</script>

</html>