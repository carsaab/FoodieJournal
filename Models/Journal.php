<?php
namespace TrainingProject\Models;

class Journal {
    public $journal_id;
    public $journal_name;
    public $user_id;
    public $created;

    public function __construct($journal_id, $journal_name, $user_id, $created) {
        $this->created = $created;
        $this->journal_id = $journal_id;
        $this->journal_name = $journal_name;
        $this->user_id = $user_id;
    }

    public static function fromArray($arr) {
        return new Journal($arr['journal_id'], $arr['journal_name'], $arr['user_id'], $arr['created']);
    }

    /* Takes an array of associative arrays (containing the members of Journal) as input,
    returns an indexed array of Journals*/
    public static function fromArrays($arrays) {
        return array_map(function ($arr) {
            return Journal::fromArray($arr);
        }, $arrays);
    }

    public function jsonSerialize() {
        return [
            'journal_id' => $this->journal_id,
            'journal_name' => $this->journal_name,
            'user_id' => $this->user_id,
            'created' => $this->created
        ];
    }

}