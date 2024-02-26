<?php
class Admin {
    private $id;
    private $userId;
    private $canDeleteArticles;
    private $canDeleteUsers;

    // Constructeur
    public function __construct($id, $userId, $canDeleteArticles, $canDeleteUsers) {
        $this->id = $id;
        $this->userId = $userId;
        $this->canDeleteArticles = $canDeleteArticles;
        $this->canDeleteUsers = $canDeleteUsers;
    }

    // Méthodes getter
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getCanDeleteArticles() {
        return $this->canDeleteArticles;
    }

    public function getCanDeleteUsers() {
        return $this->canDeleteUsers;
    }
}
