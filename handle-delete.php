<?php
require_once("foodieJournalCrudClasses.inc");

session_start();
if(!isset($_SESSION["userId"])){
    echo "<script>location.href='\login.php'</script>";
}
else{
    $userId = $_SESSION["userId"];
}

if (isset($_POST["submit"])){
    $UsersCrud = new usersCrud();
    $UsersCrud->delete($userId);
}
?>

<html>
<script>location.href="\logout.php"</script>
</html>
