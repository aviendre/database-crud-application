<?php
require_once("db_conn.php");
function execute_query($conn, $sql)
{
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully: " . $sql . "<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
}

// SQL queries to create the tables
$sql_users = "create table if not exists users
(
    userid        integer not null PRIMARY KEY AUTO_INCREMENT,
    username      char(8),
    firstname     varchar(30),
    lastname      varchar(30),
    city          varchar(30),
    state         char(2),
    email         varchar(100),
    phone         char(14),
    likesports    boolean default null,
    liketheatre   boolean default null,
    likeconcerts  boolean default null,
    likejazz      boolean default null,
    likeclassical boolean default null,
    likeopera     boolean default null,
    likerock      boolean default null,
    likevegas     boolean default null,
    likebroadway  boolean default null,
    likemusicals  boolean default null
);";

$sql_venue = "create table if not exists venue
(
    venueid    smallint not null PRIMARY KEY AUTO_INCREMENT,
    venuename  varchar(100),
    venuecity  varchar(30),
    venuestate char(2),
    venueseats integer
);";

$sql_category = "create table if not exists category
(
    catid    smallint not null PRIMARY KEY AUTO_INCREMENT,
    catgroup varchar(10),
    catname  varchar(10),
    catdesc  varchar(50)
);";

$sql_date = "create table if not exists date
(
    dateid  smallint     not null PRIMARY KEY AUTO_INCREMENT,
    caldate date         not null,
    day     character(3) not null,
    week    smallint     not null,
    month   character(5) not null,
    qtr     character(5) not null,
    year    smallint     not null,
    holiday boolean default false
);";

$sql_event = "CREATE TABLE if not exists event
(
    eventid   INT      NOT NULL PRIMARY KEY AUTO_INCREMENT,
    venueid   SMALLINT NOT NULL,
    catid     SMALLINT NOT NULL,
    dateid    SMALLINT NOT NULL,
    eventname VARCHAR(200),
    starttime datetime
);";

$sql_listing = "create table if not exists listing
(
    listid         integer  not null PRIMARY KEY AUTO_INCREMENT,
    sellerid       integer  not null,
    eventid        integer  not null,
    dateid         smallint not null,
    numtickets     smallint not null,
    priceperticket decimal(8, 2),
    totalprice     decimal(8, 2),
    listtime       datetime
);";

$sql_sales = "create table if not exists sales
(
    salesid    integer  not null PRIMARY KEY AUTO_INCREMENT,
    listid     integer  not null,
    sellerid   integer  not null,
    buyerid    integer  not null,
    eventid    integer  not null,
    dateid     smallint not null,
    qtysold    smallint not null,
    pricepaid  decimal(8, 2),
    commission decimal(8, 2),
    saletime   datetime
);";

if (isset($_POST['create_user_table'])) {
    $start_time = microtime(true);
    execute_query($conn, $sql_users); // Call the function that creates the tables
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
}

if (isset($_POST['create_venue_table'])) {
    $start_time = microtime(true);
    execute_query($conn, $sql_venue); // Call the function that creates the tables
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
}
if (isset($_POST['create_category_table'])) {
    $start_time = microtime(true);
    execute_query($conn, $sql_category); // Call the function that creates the tables
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
}
if (isset($_POST['create_date_table'])) {
    $start_time = microtime(true);
    execute_query($conn, $sql_date); // Call the function that creates the tables
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
}
if (isset($_POST['create_event_table'])) {
    $start_time = microtime(true);
    execute_query($conn, $sql_event); // Call the function that creates the tables
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
}
if (isset($_POST['create_listing_table'])) {
    $start_time = microtime(true);
    execute_query($conn, $sql_listing); // Call the function that creates the tables
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
}
if (isset($_POST['create_sale_table'])) {
    $start_time = microtime(true);
    execute_query($conn, $sql_sales); // Call the function that creates the tables
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
}

if (isset($_POST['create_all_table'])) {
    $start_time = microtime(true);
    execute_query($conn, $sql_users); // Call the function that creates the tables
    execute_query($conn, $sql_category); // Call the function that creates the tables
    execute_query($conn, $sql_date); // Call the function that creates the tables
    execute_query($conn, $sql_event); // Call the function that creates the tables
    execute_query($conn, $sql_listing); // Call the function that creates the tables
    execute_query($conn, $sql_sales); // Call the function that creates the tables
    execute_query($conn, $sql_venue); // Call the function that creates the tables
    $end_time = microtime(true);
    $execution_time = round(($end_time - $start_time) * 1000, 2); // Calculate the execution time in milliseconds
    echo "<br> Function completed in $execution_time ms";
}
?>

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


    <script>
        function goToDatabase() {
            window.location.href = "database.php";
        }
    </script>

</body>
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</html>