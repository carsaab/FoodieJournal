<?php
namespace TrainingProject\Controllers;
use \TrainingProject\Models;

class JournalController extends Controller{
    function __construct() {
        $this->model = new Models\JournalsCrud($_SESSION["userId"]);
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
    }

    // Add a new entry
    // Create a new entry
    public function write() {
        $this->model = new Models\EntriesCrud($_GET["journalId"]);
        $entry = $this->getPost();
        $this->model->create($entry);
    }

}