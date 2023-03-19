<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD</title>
</head>

<body>

<?php
require_once("db_conn.php");
echo "<br>";
// Query to fetch all records from date table
$sql = "SELECT * FROM date";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Table header
    echo "<table class='table'>";
    echo "<thead><tr><th>Date ID</th><th>Calendar Date</th><th>Day</th><th>Week</th><th>Month</th><th>Quarter</th><th>Year</th><th>Holiday</th></tr></thead>";
    
    // Table body
    echo "<tbody>";
    $counter = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $counter++;
        echo "<tr>";
        echo "<td>" . $row["dateid"] . "</td>";
        echo "<td>" . $row["caldate"] . "</td>";
        echo "<td>" . $row["day"] . "</td>";
        echo "<td>" . $row["week"] . "</td>";
        echo "<td>" . $row["month"] . "</td>";
        echo "<td>" . $row["qtr"] . "</td>";
        echo "<td>" . $row["year"] . "</td>";
        echo "<td>" . $row["holiday"] . "</td>";
        echo "</tr>";
        if ($counter > 50){
            break;
        }
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No records found.";
}
?>


</body>
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>