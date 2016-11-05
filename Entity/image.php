<?php

  class Image {
    private $id;
    private $url;
    private $title;
    private $text;
    
    function __construct($id,$url,$title,$text) {
      $this->id = $id;
      $this->url = $url;
      $this->title = $title;
      $this->text = $text;
    }
    
    # Retourne l'URL de cette image
    function getId() {
      return $this->id;
    }
    function getUrl() {
		return $this->url;
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
  
  
?>