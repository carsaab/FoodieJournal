<?php error_reporting(E_ALL);
    session_start();
    $db = mysqli_connect("localhost", "ldbuser", $_ENV["DB_PASSWORD"], "trainingproject");

    if(isset($_SESSION["userID"])){
        echo "<script>location.href='\index.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> FoodieJournal | Login </title>
</head>

<body>
<form method="post" action="" name="Login">
    Email <input type="text" name="email"> <br><br>
    Password <input type="password" name="password"> <br><br>
    <input type="submit" name="submit" value="Login">
</form>

<?php
    if (isset($_POST["submit"])){
        $email = $_POST["email"];

        $query = sprintf("SELECT user_id FROM users WHERE email='%s'", $email); //TODO check for sha3(password)
        $result = mysqli_query($db, $query);
        $numUsersFound = mysqli_num_rows($result);
        if ($numUsersFound != 1){
            echo "Email Address and/or Password incorrect. Please try again.";
        }
        else{
            $userID = mysqli_fetch_array($result)["user_id"];
            echo "userID" . $userID . "<br>"; //DEBUG
            echo "query" . $query . "<br>";
            $_SESSION["userID"] = $userID;
            mysqli_close($db);
            echo "<script>location.href='\index.php'</script>";
        }
    }

    mysqli_close($db);
?>
Don't have an account? <a href="\create_user.php">Register now for free!</a>
</body>
</html>