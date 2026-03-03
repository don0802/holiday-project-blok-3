<?php
$dbhost = 'mariadb';
$dbname = 'holiday_db';
$dbuser = 'user';
$dbpass = 'password';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
$query = "SELECT * FROM destinations";
$result = mysqli_query($conn, $query);
$destinations = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>