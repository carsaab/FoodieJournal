<?php
namespace TrainingProject\Models;

class EntriesCrud extends Crud{
    private $journalId;

    function __construct($journalId){
    $this->journalId = $journalId;
    $this->db = $this->connectToDb();
    }

    public function create($entry){
    $restaurantName = mysqli_real_escape_string($this->db, $entry["restaurantName"]); //TODO write escapeEachValue() fn
    $rating = mysqli_real_escape_string($this->db, $entry["rating"]);
    $text =  mysqli_real_escape_string($this->db, $entry["text"]);
    $wouldReturn = mysqli_real_escape_string($this->db, $entry["wouldReturn"]);

    $query = sprintf("INSERT INTO entries (restaurant_name, rating, text, would_return, journal_id)
                      VALUES('%s', '%s', '%s', '%s', '%s')",
                      $restaurantName, $rating, $text, $wouldReturn, $this->journalId);
    echo $query,"<br>";
    mysqli_query($this->db, $query);
    }

    public function read($entryId){
    $query = sprintf("SELECT * FROM entries WHERE entry_id='%s'", $entryId);
    $entry = mysqli_fetch_array(mysqli_query($this->db, $query));
    return $entry;
    }

    public function update(){}

    public function delete($entryId){
        $entryId = mysqli_real_escape_string($this->db, $entryId);
        $query = sprintf("DELETE FROM entries WHERE 'entry_id'='%s'", $entryId);
        mysqli_query($this->db, $query);
    }

    function fetchEntries($journalId){
        $query = sprintf("SELECT * FROM entries WHERE journal_id='%s'",$journalId);
        $entries = mysqli_query($this->db, $query);
        $numberOfEntries =  mysqli_num_rows($entries);

        if ($numberOfEntries === 0){
            return $numberOfEntries;
        }
         return $entries;
    }
}

