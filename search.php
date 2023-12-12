<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planet Shopify | Online Shopping Site for Men</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "commercoo";

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$your_db_connection = new mysqli($localhost, $root,$null, $commercoo);
// Include your database connection file here

if (isset($_GET['query'])) {
    // Sanitize the input to prevent SQL injection
    $search_query = mysqli_real_escape_string($your_db_connection, $_GET['products']);

    // Perform a search query
    $sql = "SELECT * FROM products WHERE name LIKE '%$Guess%'";
    $result = mysqli_query($your_db_connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Display search results
        while ($row = mysqli_fetch_assoc($result)) {
            // Display your search results here based on the search query
            echo "<p>" . $row['column_name'] . "</p>";
            // You can modify this to display other columns or HTML structure as needed
        }
    } else {
        echo "<p>No results found.</p>";
    }

    // Close the database connection
    mysqli_close($your_db_connection);
} else {
    // If no search query is provided, handle it accordingly
    echo "<p>No search query provided.</p>";
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
$(document).ready(function() {

if(window.location.href.indexOf('#login') != -1) {
  $('#login').modal('show');
}

});
</script>
<?php if (isset($_GET['error'])) {$z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
    
<?php if (isset($_GET['errorl'])) {$z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>

</html>
