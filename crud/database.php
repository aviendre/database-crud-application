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

    <div>
        <form action="create_tables.php" method="post">
            <button type="submit" name="create_user_table">Create user table</button>
        </form>
    </div>

    <div>
        <form action="create_tables.php" method="post">
            <button type="submit" name="create_venue_table">Create venue table</button>
        </form>
    </div>

    <div>
        <form action="create_tables.php" method="post">
            <button type="submit" name="create_category_table">Create category table</button>
        </form>
    </div>

    <div>
        <form action="create_tables.php" method="post">
            <button type="submit" name="create_date_table">Create date table</button>
        </form>
    </div>

    <div>
        <form action="create_tables.php" method="post">
            <button type="submit" name="create_event_table">Create event table</button>
        </form>
    </div>

    <div>
        <form action="create_tables.php" method="post">
            <button type="submit" name="create_listing_table">Create listing table</button>
        </form>
    </div>

    <div>
        <form action="create_tables.php" method="post">
            <button type="submit" name="create_sale_table">Create sale table</button>
        </form>
    </div>

    <div>
        <form action="create_tables.php" method="post">
            <button type="submit" name="create_all_table">Create all table</button>
        </form>
    </div>




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
        <form action="populate_tables.php" method="post">
            <button type="submit" name="populate_venue">Populate Venue</button>
        </form>
    </div>
    <div>
        <form action="populate_tables.php" method="post">
            <button type="submit" name="populate_category">Populate category</button>
        </form>
    </div>
    <div>
        <form action="populate_tables.php" method="post">
            <button type="submit" name="populate_date">Populate date</button>
        </form>
    </div>
    <div>
        <form action="populate_tables.php" method="post">
            <button type="submit" name="populate_event">Populate event</button>
        </form>
    </div>
    <div>
        <form action="populate_tables.php" method="post">
            <button type="submit" name="populate_listing">Populate listings</button>
        </form>
    </div>
    <div>
        <form action="populate_tables.php" method="post">
            <button type="submit" name="populate_sales">Populate sales</button>
        </form>
    </div>

    <div>
        <br>
        <h2>
            View Tables
        </h2>
        <button onclick="goToUser()">Go to user table</button>
    </div>
    <div>
        <button onclick="goToVenue()">Go to venue table</button>
    </div>
    <div>
        <button onclick="goToCategory()">Go to category table</button>
    </div>
    <div>
        <button onclick="goToDate()">Go to date table</button>
    </div>
    <div>
        <button onclick="goToEvent()">Go to event table</button>
    </div>
    <div>
        <button onclick="goToListing()">Go to listing table</button>
    </div>
    <div>
        <button onclick="goToSales()">Go to sale table</button>
    </div>

    <div>
        <br>
        <h2>
            Create Operation
        </h2>
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
            <input type="submit" value="Add Venue">
        </form>
    </div>

    <div>
        <br>
        <h2>
            Read Operation
        </h2>
        <h3>PLACEHOLDER</h3>
    </div>

    <div>
        <br>
        <h2>
            Update Operation
        </h2>
        <h3>Update Listing Price of All Events in the Venue on a Specific Month</h3>
        <form method="POST" action="update_query.php">
            <label for="venue_name">Venue Name:</label>
            <input type="text" id="venue_name" name="venue_name" required><br>

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
            </select><br>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required><br>

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