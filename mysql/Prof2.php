

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

$sql = "Select title, classroom, day, beginningtime, endingtime
From professor, section, meetingdays
Where SSN=$zn AND PSSN=$zn AND SectionNumber=DSNumber and DCNumber=CNumber";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Title: " . $row["title"]. ", Classroom:" . $row["classroom"]. ", Day:" . $row["day"]. ", Starts At:" . $row["beginningtime"]. ", Ends at:" . $row["endingtime"]."<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<a href="Professor.php">Go back</a>