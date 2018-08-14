<?php
    session_start();

    $journalID = $_GET["journalID"]; //$journal["journal_id"]; TODO get journalID and Journal name from GET request to this page instead of hardcoded journalID
    $journalName = $_GET["journalName"];
    $journalEncodedName = urlencode($journalName);
    $journalURL = "/journal.php?journalID=".$journalID."&journalName=".$journalEncodedName;

    function printStars($rating){
        if ($rating == "1"){
            echo "&starf;";
        }
        else if ($rating == "2"){
            echo "&starf;&starf;";
        }
        else if ($rating == "3"){
            echo "&starf;&starf;&starf;";
        }
        else if ($rating == "4"){
            echo "&starf;&starf;&starf;&starf;";
        }
        else if ($rating == "5"){
            echo "&starf;&starf;&starf;&starf;&starf;";
        }
        else{
            echo "No rating";
            //TODO Throw error. Rating must be either 1, 2, 3, 4, xor 5.
            //TODO allow fractional stars
            //This involves converting the string rating to an integer and having a range as the condition for each echo
            //e.g. if floor(rating)==1, echo 1 star. Even better would be to print fractions of a star
        }
        echo "<br>";
    }


?>

<!DOCTYPE html>
<html>
<head>
    <title> <?php $journalName?> | Journal </title> <!-- TODO Customize name -->
</head>
<body>

<h1> <?= $journalName ?> <br><br> </h1>

<form method="post" action="/journal.php?journalID=<?=$journalID?>&journalName=<?=$journalEncodedName?>" name="createEntry">
    Restaurant <input type="text" name="restaurantName"> <br><br>
    Rating <input type="text" name ="rating"> <br><br>
    Impression <input type="text" name="text"> <br><br>
    Would you eat here again? <input type="radio" name = "wouldReturn" value="1"> Yes
                                <input type="radio" name="wouldReturn" value="0"> No
                                <br><br>
    <input type="submit" name="submit" value="Create Entry"> <br><br><br>
</form>

<?php
    if (isset($_POST["submit"])){
    // Send user info to DB
    $restaurantName = mysqli_real_escape_string($db, $_POST["restaurantName"]);
    $rating = mysqli_real_escape_string($db, $_POST["rating"]);
    $text =  mysqli_real_escape_string($db, $_POST["text"]);
    $wouldReturn = mysqli_real_escape_string($db, $_POST["wouldReturn"]);

    $db = mysqli_connect("localhost", "ldbuser", $_ENV["DB_PASSWORD"], "trainingproject");
    $query = sprintf("INSERT INTO entries (restaurant_name, rating, text, would_return, journal_id)
                              VALUES('%s', '%s', '%s', '%s', '%s')",
                              $restaurantName, $rating, $text, $wouldReturn, $journalID);
    mysqli_query($db, $query);
    }


    $query = sprintf("SELECT * FROM entries WHERE journal_id='%s'",$journalID);
    $entries = mysqli_query($db, $query);
    $numberOfEntries =  mysqli_num_rows($entries);

    if ($numberOfEntries === 0){
        echo "You don't have any journal entries yet! Create one above.";
    }
    else{
        foreach ($entries as $entry){
            echo $entry["restaurant_name"] . "<br>";
            printStars($entry["rating"]);
            echo "Impression: " . $entry["text"] . "<br>";
            echo $entry["created"] . "<br>";
            echo "<br><br>";
        }
    }


    class entriesCrud{
        private $journalId;
        private $db;

        function create($entry){
            $restaurantName = mysqli_real_escape_string($this->db, $entry["restaurantName"]);
            $rating = mysqli_real_escape_string($this->db, $entry["rating"]);
            $text =  mysqli_real_escape_string($this->db, $entry["text"]);
            $wouldReturn = mysqli_real_escape_string($this->db, $entry["wouldReturn"]);

            $query = sprintf("INSERT INTO entries (restaurant_name, rating, text, would_return, journal_id)
                              VALUES('%s', '%s', '%s', '%s', '%s')",
                              $restaurantName, $rating, $text, $wouldReturn, $this->journalId);
            mysqli_query($this->db, $query);
        }

        function read($entryId){
            $query = sprintf("SELECT * FROM entries WHERE entry_id='%s'", $entryId);
            mysqli_query($this->db, $query);


        }

        function update(){}

        function delete(){}
    }


?>

</body>
</html>