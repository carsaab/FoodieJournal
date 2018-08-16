<?php
class journalsCrud{
    private $userId;
    private $db;

    function __construct($userId){
        $this->userId = $userId;
        $this->db = mysqli_connect("localhost", "ldbuser", $_ENV["DB_PASSWORD"],
            "trainingproject");
    }

    function create($journal){
        $journalName = mysqli_real_escape_string($this->db, $journal["journalName"]);

        $query = sprintf("INSERT INTO journals (journal_name, user_id) VALUES('%s', '%s')", $journalName, $this->userId);
        mysqli_query($this->db, $query);
    }

    function read($journalId){
        $query = sprintf("SELECT * FROM journals WHERE journal_id='%s'", $journalId);
        $journal = mysqli_fetch_array(mysqli_query($this->db, $query));
        return $journal;
    }

    function update(){}

    function delete($journalId){
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