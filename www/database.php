<?php
$host = 'mariadb';
$database = 'holiday_db';
$gebruiker = 'user';
$wachtwoord = 'password';

$conn = mysqli_connect($host, $gebruiker, $wachtwoord, $database);

mysqli_set_charset($conn, "utf8mb4");

if (!$conn) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}