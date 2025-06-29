<?php
$con = new mysqli("localhost", "root", "", "book_information_db");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>