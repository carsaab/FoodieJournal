<?php
require_once("foodieJournalCrudClasses.inc");
$journalEncodedName = urlencode($_GET['journalName']);
$journalURL = "/journal?journalId=".$_GET['journalId']."&journalName=".$journalEncodedName;
//TODO why does this not work? header('Location: /journal?journalId='.$_GET['journalId'].'&'.$journalEncodedName);

if (isset($_POST["submit"])){
    $EntriesCrud = new entriesCrud($_GET['journalId']);

    $entry = ["restaurantName" => $_POST["restaurantName"],
        "rating" => $_POST["rating"],
        "text" => $_POST["text"],
        "wouldReturn" => $_POST["wouldReturn"]];
    $EntriesCrud->create($entry);
}
?>

<html>
<script>location.href="<?=$journalURL?>"</script>
</html>

