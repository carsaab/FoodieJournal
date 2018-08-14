<?php
    session_start();
    $db = mysqli_connect("localhost", "ldbuser", $_ENV["DB_PASSWORD"], "trainingproject");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>

<body>
<form method="post" action="" name="createUser"> <!--TODO action is what?-->
    Fullname <input type="text" name="fullname"> <br><br>
    E-mail <input type="text" name="email"> <br><br>
    Username <input type="text" name="username"> <br><br>
    Password <input type="password" name="password"> <br><br>
    <!-- TODO Upload Profile Picture with separate "Upload" Submission Button -->
    <input type="submit" name="submit" value="Submit">
</form>

<?php
    function storeUserIDInSession($username, $db){
        $query = sprintf("SELECT user_id FROM users WHERE username='%s'", $username);
        $user = mysqli_query($db, $query);
        $userID = mysqli_fetch_array($user)["user_id"];
        $_SESSION["userID"] = $userID;
        return $userID;
    }


    if (isset($_POST["submit"])){
        // Send user info to DB
        $username = $_POST["username"];
        $fullname = $_POST["fullname"];
        $password =  $_POST["password"];
        $email = $_POST["email"];

        $query = sprintf("INSERT INTO users (email, username, password, fullname) VALUES('%s', '%s', '%s', '%s')", $email, $username, $password, $fullname);
        mysqli_query($db, $query);

        $userID = storeUserIDInSession($username, $db);

        $query = sprintf("INSERT INTO journals (user_id) VALUES('%s')",$userID);
        mysqli_query($db, $query);

        //TODO: insert file image as well
        //TODO hash password



    mysqli_close($db);
    }
?>

Already have an account? <a href="\login.php">Login</a>

</body>
</html>