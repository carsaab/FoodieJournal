<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>

<body>
<form method="post" action="\new-account-add.php" name="createUser"> <!--TODO action is what?-->
    Fullname <input type="text" name="fullname"> <br><br>
    E-mail <input type="text" name="email"> <br><br>
    Username <input type="text" name="username"> <br><br>
    Password <input type="password" name="password"> <br><br>
    <!-- TODO Upload Profile Picture with separate "Upload" Submission Button -->
    <input type="submit" name="submit" value="Submit">
</form>

Already have an account? <a href="\login.php">Login</a>

</body>
</html>