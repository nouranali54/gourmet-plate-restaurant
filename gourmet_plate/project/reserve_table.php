<?php
session_start();
include "config/db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request");
}

$name    = mysqli_real_escape_string($conn, $_POST['name']);
$persons = (int)$_POST['persons'];
$date    = $_POST['date'];
$time    = $_POST['time'];

$sql = "
    INSERT INTO reservations (name, persons, date, time)
    VALUES ('$name', '$persons', '$date', '$time')
";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php?reserved=1");
    exit;
} else {
    echo mysqli_error($conn);
}
