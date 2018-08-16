<?php
    require_once("handle-login-request.inc");
    require_once("foodieJournalCrudClasses.inc");
    session_start();
    if(isset($_SESSION["userId"])){
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
    Username <input type="text" name="username"> <br><br>
    Password <input type="password" name="password"> <br><br>
    <input type="submit" name="submit" value="Login">
</form>

<br>
<?php handleLoginRequest(); ?>
<br><br>

Don't have an account? <a href="\create_user.php">Register now for free!</a>
</body>
</html>