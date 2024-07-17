<?php
$host ="localhost";
$user ="root";
$pass ="";
$db ="login";

$conn = new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    die("Connection Failed : " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST["name"];
    $pass = $_POST["pass"];

    $sql = "SELECT * FROM user WHERE username ='$user' and password ='$pass'";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        echo "Welcome ". "$user !!<br><br>";
    }else{
        echo "Invalid username or Password..";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="login.php" >
        <input type="text" class="name" name="name" Placeholder="Name"><br><br>
        <input type="text" class="pass" name="pass" Placeholder="Password"><br><br>
        <input type="submit" name="submit" class="button">
    </form>
</body>
</html>