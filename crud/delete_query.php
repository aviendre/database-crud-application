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

        if (isset($_POST['delete_data'])) {
            $seller_id = $_POST['seller_id'];

            // Delete listing data
            $delete_listing_sql = "DELETE FROM listing WHERE sellerid = '$seller_id'";
            if (!mysqli_query($conn, $delete_listing_sql)) {
                echo "Error deleting listing data: " . mysqli_error($conn);
            }

            // Delete sales data
            $delete_sales_sql = "DELETE FROM sales WHERE sellerid = '$seller_id'";
            if (!mysqli_query($conn, $delete_sales_sql)) {
                echo "Error deleting sales data: " . mysqli_error($conn);
            }

            // Confirmation message
            echo "Seller data deleted successfully!";
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