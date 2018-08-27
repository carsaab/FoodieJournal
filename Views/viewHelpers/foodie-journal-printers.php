<?php
namespace TrainingProject\Views;

class JournalPrinters {
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
    return;
}


function printEntry($entry){
    echo "<h3>".$entry["restaurant_name"]."</h3>";
    $this->printStars($entry["rating"]);
    echo "<br> <b>Impression:</b> " . $entry["text"] . "<br>";
    echo $entry["created"] . "<br>";
    echo "<br><br>";
    return;
}


function printJournalContents($entries){
    if ($entries === 0){
        echo "You don't have any journal entries yet! Create one above.";
    }
    else{
        foreach ($entries as $entry){
            $this->printEntry($entry);
        }
    }
    return;
}

function printJournalNameAsLink($journal){
    $journalId = $journal["journal_id"];
    $journalName = $journal["journal_name"];
    $journalURL = "/api/journal/entry?journalId=".$journalId."&journalName=".urlencode($journalName);
    echo "<a href=".$journalURL.">".$journalName."</a><br><br>";
    return;
}

function printLinksToTheseJournals($journals){

    foreach ($journals as $journal){
            $this->printJournalNameAsLink($journal);
    }
    return;
}


function printCurrentUsersJournals($journals){
    if ($journals === 0){
        echo "You don't have any journal yet! Create one above.";
    }
    else{
        $this->printLinksToTheseJournals($journals);
    }
    return;
}
}
