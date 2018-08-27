<?php
namespace TrainingProject\Models;

class EntriesDBGateway {
    private $journalId;
    private $database;

    function __construct($journalId){
        $this->journalId = $journalId;
        $this->database = new DataManager();
    }

    public function create($entry){
        $restaurantName = mysqli_real_escape_string($this->db, $entry["restaurantName"]); //TODO write escapeEachValue() fn
        $rating = mysqli_real_escape_string($this->db, $entry["rating"]);
        $text =  mysqli_real_escape_string($this->db, $entry["text"]);
        $wouldReturn = mysqli_real_escape_string($this->db, $entry["wouldReturn"]);

        $query = "INSERT INTO entries (restaurant_name, rating, text, would_return, journal_id)
                          VALUES('{$restaurantName}', '{$rating}', '{$text}', '{$wouldReturn}', $this->journalId)";
        echo $query,"<br>";
        $this->database->query($query);
    }

    public function read($entryId){
        $query = "SELECT * FROM entries WHERE entry_id='{$entryId}'";
        $this->database->query($query);
        return Entry::fromArray($this->database->fetch());
    }

    public function update(){}

    public function delete($entryId){
        $entryId = mysqli_real_escape_string($this->db, $entryId);

        $query = "DELETE FROM entries WHERE entry_id= '{$entryId}'";
        $this->database->query($query);
    }

    function getEntries($journalId){
        $query = "SELECT * FROM entries WHERE journal_id='{$journalId}'";
        $this->database->query($query);
        $numberOfEntries =  $this->database->rowCount();

        if ($numberOfEntries === 0){
            return $numberOfEntries;
        }
        return Entry::fromArrays($this->database->fetchAll());
    }
}

