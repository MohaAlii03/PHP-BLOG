<?php
class Category {
    private $id;
    private $name;

    // Constructeur
    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    // Méthodes getter
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
}
