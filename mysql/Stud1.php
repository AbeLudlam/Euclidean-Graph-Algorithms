

<?php
$servername = "shell.ecs.fullerton.edu";
$username = "cs332g30";
$password = "baodegee";
$dbname = "cs332g30";


$zn = $_GET['zname'];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT SectionNumber, day, classroom, beginningtime, endingtime, Count(SCWID) FROM section, enrollmentrecords,meetingdays Where CNumber=$zn AND SNumber=SectionNumber AND DSNumber=SectionNumber AND DCNumber=$zn and SCNUmber=$zn GROUP BY SectionNumber, day";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Section Number: " . $row["SectionNumber"]. ", Day:" . $row["day"]. ", Classroom:" . $row["classroom"]. ", Starts At:" . $row["beginningtime"]. ", Ends at:" . $row["endingtime"]. " - Number of Students: " . $row["Count(SCWID)"]."<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<a href="Students.php">Go back</a>