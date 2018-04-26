

<?php
$servername2 = "127.0.0.1";
$username = "root";
$password = "deadman";
$dbname = "332_project";

$sn = $_GET['fname'];
$cn = $_GET['lname'];

// Create connection
$conn = mysqli_connect($servername2, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT grade, Count(grade) FROM enrollmentrecords Where SNumber=$sn AND SCNumber=$cn GROUP BY grade";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "grade: " . $row["grade"]. " -Number of Students " . $row["Count(grade)"]."<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<a href="Professor.php">Go back</a>