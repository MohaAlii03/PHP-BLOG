<?php
class Article {
    private $id;
    private $userId;
    private $title;
    private $content;
    private $creationDate;
    private $lastModification;

    // Constructeur
    public function __construct($id, $userId, $title, $content, $creationDate, $lastModification) {
        $this->id = $id;
        $this->userId = $userId;
        $this->title = $title;
        $this->content = $content;
        $this->creationDate = $creationDate;
        $this->lastModification = $lastModification;
    }

    // Méthodes getter
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function getLastModification() {
        return $this->lastModification;
    }
}
