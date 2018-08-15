<?php
    require_once("foodieJournalCrudClasses.inc");
    require_once("foodie-journal-printers.php");
    session_start();
    $UsersCrud = new usersCrud();
    $JournalsCrud = new journalsCrud();

    $userId = $_SESSION["userId"];
    $username = $UsersCrud->read($userId)["username"];
?>

<!DOCTYPE html>
<html>
<head>
    <title> FoodieJournal | Home </title>
</head>
<body>

<h1> Welcome, <?=$username?> </h1>

<form method = "post" action="" name="new_entry">
    <!--TODO form to create new journal-->
</form>

<?php printCurrentUsersJournals($userId, $JournalsCrud); ?>

<br> <br>
<a href="/account.php">Account</a> <br>
<a href="/logout.php">Logout</a>
</body>
</html>