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

    public function getItems()
    {
        $sql = "SELECT * FROM item";
        return $this->query($sql);
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

    public function updateMenu($menu)
    {
        $sql = "UPDATE `menu` SET `menu` = '$menu' WHERE `menu`.`id` = '1';";
        return $this->execute($sql);
    }

    public function getMenu()
    {
        $sql = "SELECT * FROM menu WHERE `menu`.`id` = 1;";
        return $this->row($sql);
    }

    public function saveOrder($user_id, $user_name, $order) {
        $sql = "INSERT INTO `order` (`id`, `user_id`, `user_name`, `order`, `datetime`) VALUES (NULL, '$user_id', '$user_name', '$order', CURRENT_TIMESTAMP)";
        $this->execute($sql);
    }

    public function getTodaysOrders() 
    {
        $sql = "SELECT * FROM `order` WHERE DATE(`datetime`) = CURDATE()";
        return $this->query($sql);
    }
}
