<?php

class article {

    private $id;
    private $url;
    private $category;
    private $date;
    private $title;
    private $text;

    function __construct($id, $url, $category, $date, $title, $text) {
        $this->id = $id;
        $this->url = $url;
        $this->category = $category;
        $this->date = date("d-m-Y", strtotime($date));
        $this->title = $title;
        $this->text = $text;
    }

    function getId() {
        return $this->id;
    }

    function getUrl() {
        return $this->url;
    }

    function getCategory() {
        return $this->category;
    }

    function setCategory($category) {
        $this->category = $category;
    }

    function getDate() {
        return $this->date;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function getTitle() {
        return $this->title;
    }

    function setTitle() {
        $this->title = $title;
    }
    
    function getText() {
        return $this->text;
    }

    function setText() {
        $this->text = $text;
    }

}
