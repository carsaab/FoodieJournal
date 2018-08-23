--> MAIN
Get 1st url param
Require the file that matches that param


--> Login.php
<?php
class Login {

    public function __construct() {
        require_once("foodieJournalCrudClasses.inc");
        require_once("foodie-journal-printers.php");
        session_start();
        $UsersCrud = new usersCrud();
        $JournalsCrud = new journalsCrud();

        $userId = $_SESSION["userId"];
        $username = $UsersCrud->read($userId)["username"];
        $journals = $journalsCrud->getJournals($userId);
        require_once ("login.html");
    }
}
?>





--> LOGIN.html
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

<?php printCurrentUsersJournals($journals); ?>

<br> <br>
<a href="/V1/account.phpphp">Account</a> <br>
<a href="/V1/logout.php">Logout</a>
</body>
</html>