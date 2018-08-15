<?php
    session_start();
    $db = mysqli_connect("localhost", "ldbuser", $_ENV["DB_PASSWORD"], "trainingproject"); //TODO crud
?>

<!DOCTYPE html>
<html>
<head>
    <title> FoodieJournal | Home </title>
</head>
<body>

<?php //TODO read() user from crud instead, then user["username"], etc
    $userId = $_SESSION["userId"];
    $query = sprintf("SELECT username FROM users WHERE user_id='%s'", $userId);
    $result = mysqli_query($db, $query);
    $username = mysqli_fetch_array($result)["username"];
?>
<h1> Welcome, <?php echo $username; ?> </h1>

<form method = "post" action="" name="new_entry">
    <!--TODO form to create new journal-->
</form>

<?php //TODO print journals. make it just like the /journal URL. might be good to look into templates after this.
    $query = sprintf("SELECT * FROM journals WHERE user_id='%s'",$userId);
    $journals = mysqli_query($db, $query);
    $numberOfJournals =  mysqli_num_rows($journals);

    if ($numberOfJournals === 0){
        echo "You don't have any journals yet! Create one above.";
    }
    else{
        foreach ($journals as $journal){
            $journalId = $journal["journal_id"];
            $journalName = $journal["journal_name"];
            $journalURL = "/journal.php?journalId=".$journalId."&journalName=".urlencode($journalName);
            echo "<a href=".$journalURL.">".$journalName."</a><br><br>";
        }
    }

    mysqli_close($db);
?>
<br> <br>
<a href="/account.php">Account</a> <br>
<a href="/logout.php">Logout</a>
</body>
</html>