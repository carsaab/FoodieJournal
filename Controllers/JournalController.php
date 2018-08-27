<?php
namespace TrainingProject\Controllers;
use \TrainingProject\Models;
use \TrainingProject\Views;

class JournalController extends Controller{

    private $entriesModel;

    function __construct() {
        $this->model = new Models\JournalsDataManager($_SESSION["userId"]);
        $this->entriesModel = new Models\EntriesDBGateway($_GET["journalId"]);
    }

    public function index(){
        $username = $_SESSION["username"];
        $userId = $_SESSION["userId"];
        $journals = $this->model->getJournals($userId);
        require_once ("C:\PersonalProjects\TrainingProject\Views\index.html"); //TODO don't hardcode path
    }

    //POST
    public function create(){
        $newJournalInfo = $this->getPost();
        $this->model->create($newJournalInfo);
    }


    public function read(){}


    public function update(){}


    public function delete($journalId){
        $this->model->delete($journalId);
    }

    //View all the entries in a journal
    //returns all the entries data of a journal with journalId
    public function open(){
        /*TODO get all the variables from the entries DB
        * declare the variables used by the openedJournal view
        * extract them using render function and put them into the loaded view */

        require_once("C:/PersonalProjects/TrainingProject/Views/viewHelpers/foodie-journal-printers.php"); //TODO don't hardcode path
        $journalPrinter = new Views\JournalPrinters();

        $journalId = $_GET["journalId"];
        $journalName = $_GET["journalName"];
        $journalEncodedName = urlencode($journalName);
        $journalURL = "/entry-add.php?journalId=".$journalId."&journalName=".$journalEncodedName;
        $entries = $this->entriesModel->getEntries($journalId);

        require_once ("C:\PersonalProjects\TrainingProject\Views\journal.html");
    }

    // Add a new entry
    // Create a new entry
    public function write() {
        $entry = $this->getPost();
        $this->model->create($entry);
    }

}