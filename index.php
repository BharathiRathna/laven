<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the entered username and password
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Prepare the SQL query
  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

  // Execute the query
  $result = $conn->query($sql);

  // Check if the query returned any rows
  if ($result->num_rows > 0) {
    // The user exists in the database
    echo "<p>Welcome, $username!</p>";
  } else {
    // The user does not exist in the database
    echo "<p>Error: Invalid username or password.</p>";
  }
}
?>

<!-- HTML form for entering the username and password -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" Placeholder ="UserName" required><br><br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" Placeholder ="Password" required><br><br>
  <input type="submit" value="Submit">
</form>
