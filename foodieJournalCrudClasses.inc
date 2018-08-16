<?php
session_start(); //TODO is this necessary once all is written? do we ever use session in crud e.g. for user?

class entriesCrud{
    private $journalId;
    private $db;

    function __construct($journalId){
    $this->journalId = $journalId;
    $this->db = mysqli_connect("localhost", "ldbuser", $_ENV["DB_PASSWORD"],
    "trainingproject");
    }

    function create($entry){
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

    function read($entryId){
    $query = sprintf("SELECT * FROM entries WHERE entry_id='%s'", $entryId);
    $entry = mysqli_fetch_array(mysqli_query($this->db, $query));
    return $entry;
    }

    function update(){}

    function delete($entryId){
        $entryId = mysqli_real_escape_string($this->db, $entryId);
        $query = sprintf("DELETE FROM entries WHERE 'entry_id'='%s'", $entryId);
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


class usersCrud{
    private $db;

    function __construct(){
        $this->db = mysqli_connect("localhost", "ldbuser", $_ENV["DB_PASSWORD"],
            "trainingproject");
    }

    function fetchUserId($username){
        $query = sprintf("SELECT user_id FROM users WHERE username='%s'", $username);
        $user = mysqli_query($this->db, $query);

        $numUsersFound = mysqli_num_rows($user);
        if ($numUsersFound === 0){
            return $numUsersFound;
        }

        $userId = mysqli_fetch_array($user)["user_id"];
        return $userId;
    }


    function create($user){
        $email = mysqli_real_escape_string($this->db, $user["email"]);
        $username = mysqli_real_escape_string($this->db, $user["username"]);
        $password = mysqli_real_escape_string($this->db, $user["password"]);
        $fullname = mysqli_real_escape_string($this->db, $user["fullname"]);
        //TODO photo upload functionality in progress $profile_picture_file = mysqli_real_escape_string($this->db, $user["profile_picture_file"]);
        $query = sprintf("INSERT INTO users (email, username, password, fullname) VALUES('%s', '%s', '%s', '%s')", $email, $username, $password, $fullname);
        mysqli_query($this->db, $query);

        $userId = $this->fetchUserId($username);
        return $userId;
    }


    function read($userId){
        $query = sprintf("SELECT * FROM users WHERE user_id='%s'", $userId);
        $user = mysqli_fetch_array(mysqli_query($this->db, $query));
        return $user;
    }


    function update(){}


    function delete($userId){
        $userId = mysqli_real_escape_string($this->db, $userId);
        $query = sprintf("DELETE FROM users WHERE user_id='%s'", $userId);
        mysqli_query($this->db, $query);
        //TODO catch errors
    }
}

?>