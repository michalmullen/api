<?php

require_once(__DIR__ . '/Model.php');

class Student extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getStudent($id)
    {
        $sql = "SELECT * FROM student WHERE id = $id";
        return $this->row($sql);
    }
}
