<?php
$con=mysqli_connect("localhost","root","","commercoo");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
