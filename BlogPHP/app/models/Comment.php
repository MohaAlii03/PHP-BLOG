<?php
class Comment {
    private $id;
    private $userId;
    private $articleId;
    private $content;
    private $commentDate;

    // Constructeur
    public function __construct($id, $userId, $articleId, $content, $commentDate) {
        $this->id = $id;
        $this->userId = $userId;
        $this->articleId = $articleId;
        $this->content = $content;
        $this->commentDate = $commentDate;
    }

    // Méthodes getter
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getArticleId() {
        return $this->articleId;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCommentDate() {
        return $this->commentDate;
    }
}
