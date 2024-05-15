<?php
// Database connection details
$servername = "localhost"; // Change this to your server name if it's different
$username = "your_username"; // Change this to your database username
$password = "your_password"; // Change this to your database password
$dbname = "your_database"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to add enrollment
function addEnrollment($studentName, $courseName) {
    global $conn;
    $enrollmentDate = date("Y-m-d"); // Get current date
    $sql = "INSERT INTO enrollments (student_name, course_name, enrollment_date) VALUES ('$studentName', '$courseName', '$enrollmentDate')";
    if ($conn->query($sql) === TRUE) {
        echo "Enrollment added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to display enrollments
function displayEnrollments() {
    global $conn;
    $sql = "SELECT * FROM enrollments";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Student Name</th><th>Course Name</th><th>Enrollment Date</th></tr>";
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["student_name"]."</td><td>".$row["course_name"]."</td><td>".$row["enrollment_date"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}

// Example usage
// Add enrollment
//addEnrollment("John Doe", "Mathematics");

// Display enrollments
//displayEnrollments();

// Close connection
$conn->close();
?>
