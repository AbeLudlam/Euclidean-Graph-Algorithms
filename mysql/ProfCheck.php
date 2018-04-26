
<?php
$servername = "shell.ecs.fullerton.edu";
$username = "cs332g30@shell.ecs.fullerton.edu";
$password = "baodeege";
$dbname = "cs332g30";

$zn = $_GET['zname'];
$link_address1 = 'Professor.php';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT SSN FROM professor Where SSN=$zn";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo "<a href='$link_address1'>Go to Professor Interface</a><br>";
    }
} else {
    echo "0 results<br>";
}

mysqli_close($conn);
?>
<a href="Mainpage.php">Go back</a>