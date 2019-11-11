<?php

require_once(__DIR__ . '/Model.php');

class Item extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getItem($id)
    {
        $sql = "SELECT * FROM item WHERE id = $id";
        return $this->row($sql);
    }

    public function saveItem($title, $image, $description)
    {
        $sql = "INSERT INTO `Item` (`id`, `title`, `image`, `description`) VALUES (NULL, '$title', '$image', '$description');";
        $this->execute($sql);
    }

    public function deleteItem($id)
    {
        $sql = "DELETE FROM `Item` WHERE `Item`.`id` = $id";
        return $this->row($sql);
    }
}
