<?php

require_once(__DIR__ . '/Model.php');

class Basket extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getBasket($id)
    {
        $sql = "SELECT * FROM basket WHERE id = $id";
        return $this->row($sql);
    }

    public function saveBasketItem($userId, $itemId)
    {
        $sql = "INSERT INTO `basket` (`user_id`, `item_id`) VALUES ('$userId', '$itemId');";
        $this->execute($sql);
    }

    public function deleteBasketItem($id)
    {
        $sql = "DELETE FROM `basket` WHERE `basket`.`user_id` = $id";
        return $this->row($sql);
    }
}
