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
// Query to fetch all records from users table
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Table header
    echo "<table class='table'>";
    echo "<thead><tr><th>User ID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>City</th><th>State</th><th>Email</th><th>Phone</th><th>Likes Sports</th><th>Like Theatre</th><th>Like Concerts</th><th>Like Jazz</th><th>Like Classical</th><th>Like Opera</th><th>Like Rock</th><th>Like Vegas</th><th>Like Broadway</th><th>Like Musicals</th></tr></thead>";
    
    // Table body
    echo "<tbody>";
    $counter = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $counter++;
        echo "<tr>";
        echo "<td>" . $row["userid"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["city"] . "</td>";
        echo "<td>" . $row["state"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . ($row["likesports"]? ($row["likesports"] == "1" ? "Yes" : "No") : NULL) . "</td>";
        echo "<td>" . ($row["liketheatre"]? ($row["liketheatre"] ? "Yes" : "No") : NULL) . "</td>";
        echo "<td>" . ($row["likeconcerts"]? ($row["likeconcerts"] ? "Yes" : "No") : NULL) . "</td>";
        echo "<td>" . ($row["likejazz"]? ($row["likejazz"] ? "Yes" : "No") : NULL) . "</td>";
        echo "<td>" . ($row["likeclassical"]? ($row["likeclassical"] ? "Yes" : "No") : NULL) . "</td>";
        echo "<td>" . ($row["likeopera"]? ($row["likeopera"] ? "Yes" : "No") : NULL) . "</td>";
        echo "<td>" . ($row["likerock"]? ($row["likerock"] ? "Yes" : "No") : NULL) . "</td>";
        echo "<td>" . ($row["likevegas"]? ($row["likevegas"] ? "Yes" : "No") : NULL) . "</td>";
        echo "<td>" . ($row["likebroadway"]? ($row["likebroadway"] ? "Yes" : "No") : NULL) . "</td>";
        echo "<td>" . ($row["likemusicals"]? ($row["likemusicals"] ? "Yes" : "No") : NULL) . "</td>";
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