<?php
require_once ("foodieJournalCrudClasses.inc");


if (isset($_POST["submit"])){

    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $password =  $_POST["password"];
    $email = $_POST["email"];

    $user = ["username" => $username,
            "fullname" => $fullname,
            "password" => $password,
            "email" => $email];
    $UsersCrud = new usersCrud();
    $userId = $UsersCrud->create($user);

    $_SESSION["userId"] = $userId;

    $JournalsCrud = new journalsCrud($userId);
    $JournalsCrud->create("My Food Adventures");

    //TODO: insert file image as well
    //TODO hash password
}
?>

<html>
<script>location.href="\index"</script>
</html>
