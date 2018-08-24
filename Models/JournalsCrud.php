<?php
namespace TrainingProject\Models;

class JournalsCrud{
    private $userId;

    function __construct($userId){
        $this->userId = $userId;
        $this->db = $this->connectToDb();
    }


    public function create($journal){
        $journalName = mysqli_real_escape_string($this->db, $journal["journalName"]);

        $query = sprintf("INSERT INTO journals (journal_name, user_id) VALUES('%s', '%s')", $journalName, $this->userId);
        mysqli_query($this->db, $query);
    }


    public function read($journalId){
        $query = sprintf("SELECT * FROM journals WHERE journal_id='%s'", $journalId);
        $journal = mysqli_fetch_array(mysqli_query($this->db, $query));
        return $journal;
    }


    public function update(){}


    public function delete($journalId){
        $journalId = mysqli_real_escape_string($journalId);
        $query = sprintf("DELETE FROM journals WHERE 'journal_id'='%s'", $journalId);
        mysqli_query($this->db, $query);
        //TODO: error catching
    }


    function fetchJournals($userId){
        $query = sprintf("SELECT * FROM journals WHERE user_id='%s'",$userId);
        $journals = mysqli_query($this->db, $query);
        $numberOfJournals =  mysqli_num_rows($journals);

        if ($numberOfJournals === 0){
            return $numberOfJournals;
        }
        return $journals;
    }
}
?>