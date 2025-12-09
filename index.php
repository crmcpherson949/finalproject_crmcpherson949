<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Directory Search</title>
    <link rel="stylesheet" href="styles/main.css">
    <script src="scripts/main.js" defer></script>
</head>
<body>

<h1>Student Directory Search</h1>

<p>Christopher McPherson</p>
<p><?php echo date("F j, Y"); ?></p>

<form method="POST" action="search.php">
    <label for="lastname">Enter Last Name:</label>
    <input type="text" name="lastname" id="lastname" required>
    <button type="submit">Search</button>
</form>

</body>
</html>
