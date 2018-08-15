<?php
require_once("foodie-journal-printers.php");
require("foodieJournalCrudClasses.inc");
session_start();

$journalId = $_GET["journalId"];
$journalName = $_GET["journalName"];
$journalEncodedName = urlencode($journalName);
$journalURL = "/journal-add.php?journalId=".$journalId."&journalName=".$journalEncodedName;

$EntriesCrud = new entriesCrud($journalId);
?>

<!DOCTYPE html>
<html>
<head>
    <title> <?=$journalName?> | Journal </title> <!-- TODO Customize name -->
</head>
<body>

<h1> <?= $journalName ?> <br><br> </h1>

<form method="post" action="<?=$journalURL?>" name="createEntry">
    Restaurant <input type="text" name="restaurantName"> <br><br>
    Rating <input type="text" name ="rating"> <br><br>
    Impression <input type="text" name="text"> <br><br>
    Would you eat here again? <input type="radio" name = "wouldReturn" value="1"> Yes
                                <input type="radio" name="wouldReturn" value="0"> No
                                <br><br>
    <input type="submit" name="submit" value="Create Entry"> <br><br><br>
</form>

<?php printJournalContents($journalId, $EntriesCrud); ?>

</body>
</html>