<?php
namespace TrainingProject\Controllers;
use \TrainingProject\Models;
use \TrainingProject\DataAccess;
use \TrainingProject\Views;

class JournalController extends Controller{

    private $entriesModel;

    function __construct() {
        $this->databaseGateway = new DataAccess\JournalsDBGateway($_SESSION["userId"]);
        $this->entriesDatabaseGateway = new DataAccess\EntriesDBGateway($_GET["journalId"]);
    }

    public function index(){
        $username = $_SESSION["username"];
        $userId = $_SESSION["userId"];
        $journals = $this->databaseGateway->getJournals($userId);
        require_once ("C:\PersonalProjects\TrainingProject\Views\index.html"); //TODO don't hardcode path
    }

    //POST
    public function create(){
        $newJournalInfo = $this->getPost();
        $this->databaseGateway->create($newJournalInfo);
    }


    public function read(){}


    public function update(){}


    public function delete($journalId){
        $this->databaseGateway->delete($journalId);
    }

    //View all the entries in a journal
    //returns all the entries data of a journal with journalId
    public function open(){
        /*TODO get all the variables from the entries DB
        * declare the variables used by the openedJournal view
        * extract them using render function and put them into the loaded view */

        $journalId = $_GET["journalId"];
        $journalName = $_GET["journalName"];
        $journalEncodedName = urlencode($journalName);
        $entryAddUrl = "/api/journal/entry?journalId=".$journalId."&journalName=".$journalEncodedName; //."&XDEBUG_SESSION_START=16029";
        $entries = $this->entriesDatabaseGateway->getEntries($journalId);

        require_once ("C:\PersonalProjects\TrainingProject\Views\journal.html");
    }

    // Add a new entry
    // Create a new entry
    public function write() {
        $entry = $this->getPost();
        $this->entriesDatabaseGateway->create($entry);
    }

}