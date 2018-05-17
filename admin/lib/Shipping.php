<?php

/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 12:36 PM
 */
class Shipping
{
    // Initializing DB
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllShipping(){
        $query = "SELECT * FROM shipping ";
        $this->db->query($query);

        $result = $this->db->resultset();
        return $result;
    }


    public function register($data){
        $this->db
            ->query("INSERT INTO shipping
                      (shipping_entity_name, shipping_entity_cost)
                       VALUES (:shipping_entity_name, :shipping_entity_cost)");

        $this->db->bind(':shipping_entity_name', $data['shipping_entity_name']);
        $this->db->bind(':shipping_entity_cost', $data['shipping_entity_cost']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}