<?php
require_once(__DIR__ . '/Config.php');


class Model
{


    public function __construct()
    {


        $c = new Config();


        $this->db = new mysqli($c->host, $c->user, $c->pass, $c->db);
        if ($this->db->connect_errno) {
            header('HTTP/1.1 500 Internal Server Error');
            echo 'Database connection error';
            exit();
        }
    }


    # clenup methods


    public function escape($string)
    {
        return $this->db->escape_string($string);
    }


    public function quote($string)
    {
        return "'" . $string . "'";
    }


    public function escapeArray($array, $quoted = true)
    {
        $escaped = array_map([$this, 'escape'], $array);
        if ($quoted) {
            return array_map([$this, 'quote'], $escaped);
        } else {
            return $escaped;
        }
    }


    # query methods
    public function query($sql)
    {
        $result = $this->db->query($sql)
            or die($sql);
        $data = array();
        while ($row = $result->fetch_object()) $data[] = $row;
        return $data;
    }


    public function row($sql)
    {
        $result = $this->db->query($sql)
            or die($sql);
        return $result->fetch_assoc();
    }


    public function count($sql)
    {
        $result = $this->db->query($sql)
            or die($sql);
        return $result->num_rows;
    }


    public function execute($sql)
    {
        $result = $this->db->query($sql)
            or die($sql);
        return $result;
    }


    public function number_of_rows()
    {
        return $this->db->affected_rows;
    }


    public function get_last_id()
    {
        $id = $this->db->insert_id;
        return $id;
    }
}
