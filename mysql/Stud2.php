

<?php
$servername = "shell.ecs.fullerton.edu";
$username = "cs332g30";
$password = "baodegee";
$dbname = "cs332g30";


$sn = $_GET['fname'];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT SCNumber, grade
FROM enrollmentrecords
WHERE SCWID=$sn
";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Course Number: " . $row["SCNumber"]. ", Grade:  " . $row["grade"]."<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<a href="Students.php">Go back</a>