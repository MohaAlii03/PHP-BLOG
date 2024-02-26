<?php
class ArticleCategory {
    private $articleId;
    private $categoryId;

    // Constructeur
    public function __construct($articleId, $categoryId) {
        $this->articleId = $articleId;
        $this->categoryId = $categoryId;
    }

    // Méthodes getter
    public function getArticleId() {
        return $this->articleId;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }
}
