

<?php
$servername = "shell.ecs.fullerton.edu";
$username = "cs332g30";
$password = "baodegee";
$dbname = "cs332g30";

$zn = $_GET['fname'];
$link_address1 = 'Students.php';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT CWID FROM studentrecords Where CWID=$zn";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       echo "<a href='$link_address1'>Go to Student Interface</a><br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<a href="Mainpage.php">Go back</a>