<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href="styles/main.css">
    <script src="scripts/main.js" defer></script>
</head>
<body>

<h1>Search Results</h1>
<a href="index.php">← Return to Home</a>

<?php
// ✅ 1. Connect to database
$conn = new mysqli("localhost", "root", "mysql", "student_directory");

// ✅ 2. Check connection
if ($conn->connect_error) {
    die("<p>Connection failed: " . $conn->connect_error . "</p>");
}

// ✅ 3. Get form input
$lastname = $_POST["lastname"] ?? "";

// ✅ 4. Prepare stored procedure call
$stmt = $conn->prepare("CALL search_students(?)");
$stmt->bind_param("s", $lastname);

// ✅ 5. Execute stored procedure
$stmt->execute();
$result = $stmt->get_result();

// ✅ 6. Check if results exist
if ($result->num_rows > 0) {

    echo "<table>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["first_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["last_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "<p>No students found.</p>";
}

// ✅ 7. Cleanup
$stmt->close();
$conn->close();
?>

</body>
</html>
