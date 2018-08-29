<?php
namespace TrainingProject\DataAccess;
use \TrainingProject\Models\Journal;

class JournalsDBGateway{
    private $userId;
    private $database;

    function __construct($userId){
        $this->userId = $userId;
        $this->database = new DataManager();
    }


    public function create($journal){
        $journalName = $journal["journalName"];
        $query = "INSERT INTO journals (journal_name, user_id) VALUES({$journalName}, {$this->userId})";
        $this->database->query($query);
    }


    public function read($journalId){
        $query = "SELECT * FROM journals WHERE journal_id='{$journalId}'";
        $this->database->query($query);
        return Journal::fromArray($this->database->fetch());
    }


    public function update(){}


    public function delete($journalId){
        $query = "DELETE FROM journals WHERE '{$journalId}'";
        $this->database->query($query);
        //TODO: error catching
    }


    function getJournals($userId){
        $query = "SELECT * FROM journals WHERE user_id=$userId";
        $this->database->query($query);
        $numberOfJournals =  $this->database->rowCount();

        //move out of db gateway - just return null
        if ($numberOfJournals === 0){
            return $numberOfJournals;
        }

        return Journal::fromArrays($this->database->fetchAll());
    }
}
