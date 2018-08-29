<?php
namespace TrainingProject\DataAccess;
use \TrainingProject\Models\Entry;

class EntriesDBGateway {
    private $journalId;
    private $database;


    function __construct($journalId){
        $this->journalId = $journalId;
        $this->database = new DataManager();
    }


    public function create($entry){
        $query = "INSERT INTO entries (restaurant_name, rating, text, would_return, journal_id)
                          VALUES('{$entry['restaurantName']}', '{$entry['rating']}', '{$entry['text']}', '{$entry['wouldReturn']}', $this->journalId)";
        echo $query,"<br>";
        echo "test";
        $this->database->query($query);
    }


    public function read($entryId){
        $query = "SELECT * FROM entries WHERE entry_id='{$entryId}'";
        $this->database->query($query);
        return Entry::fromArray($this->database->fetch());
    }


    public function update(){}


    public function delete($entryId){
        $query = "DELETE FROM entries WHERE entry_id= '{$entryId}'";
        $this->database->query($query);
    }


    function getEntries($journalId){
        $query = "SELECT * FROM entries WHERE journal_id={$journalId}";
        $this->database->query($query);
        $numberOfEntries =  $this->database->rowCount();

        if ($numberOfEntries === 0){
            return $numberOfEntries;
        }
        return Entry::fromArrays($this->database->fetchAll());
    }
}

