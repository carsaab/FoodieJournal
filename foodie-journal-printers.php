<?php

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
        //This will involve converting the string rating to an integer and having a range as the condition for each echo
        //e.g. if floor(rating)==1, echo 1 star. Even better would be to print fractions of a star
    }
    echo "<br>";
}

function printEntry($entry){
    echo $entry["restaurant_name"] . "<br>";
    printStars($entry["rating"]);
    echo "Impression: " . $entry["text"] . "<br>";
    echo $entry["created"] . "<br>";
    echo "<br><br>";
}

function printJournalContents($journalId, $EntriesCrud){
    $entries = $EntriesCrud->fetchEntries($journalId);

    if ($entries === 0){
        echo "You don't have any journal entries yet! Create one above.";
    }
    else{
        foreach ($entries as $entry){
            printEntry($entry);
        }
    }
}

?>