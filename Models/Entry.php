<?php
namespace TrainingProject\Models;

class Entry {
    public $restaurant_name;
    public $rating;
    public $text;
    public $would_return;
    public $journal_id;

    public function __construct($restaurant_name, $rating, $text, $would_return, $journal_id) {
        $this->restaurant_name = $restaurant_name;
        $this->rating = $rating;
        $this->text = $text;
        $this->would_return = $would_return;
        $this->journal_id = $journal_id;
    }

    public static function fromArray($arr) {
        return new Entry($arr['restaurant_name'], $arr['rating'], $arr['text'], $arr['would_return'], $arr['journal_id']);
    }

    public static function fromArrays($arrays) {
        return array_map(function ($arr) {
            return Entry::fromArray($arr);
        }, $arrays);
    }

    public function jsonSerialize() {
        return [
            'restaurant_name' => $this->restaurant_name,
            'rating' => $this->rating,
            'textText' => $this->text,
            'would_return' => $this->would_return,
            'journal_id' => $this->journal_id
        ];
    }

}