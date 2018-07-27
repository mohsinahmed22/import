<?php

/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 12:36 PM
 */
class Shipping
{
    /**
     * @var Database
     */
    private $db;

    /**
     * Shipping constructor.
     */
    public function __construct()
    {
        $this->db = new Database();
    }


    /**
     * Select All Shipping
     * @return mixed
     */
    public function getAllShipping(){
        $query = "SELECT * FROM shipping ";
        $this->db->query($query);

        $result = $this->db->resultset();
        return $result;
    }

    /**
     * Add New Shipping
     * @param $data
     * @return bool
     */
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


    /**
     * Update Shipping
     * @param $data
     * @return bool
     */
    public function update($data){
        $this->db
            ->query("UPDATE shipping SET 
                           shipping_entity_cost = :shipping_entity_cost,
                           shipping_entity_name = :shipping_entity_name 
                           WHERE id = :id
                   ");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':shipping_entity_name', $data['shipping_entity_name']);
        $this->db->bind(':shipping_entity_cost', $data['shipping_entity_cost']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    /*
     * Shipping Single
     */
    public function getShipping($id){
        $this->db->query("SELECT * FROM shipping where id = :id");
        $this->db->bind(':id', $id);

        $result = $this->db->single();

       return $result;
    }

    /**
     * Delete Shipping
     * @param $id
     * @return bool
     */
    public function deleteShipping($id){
        $this->db->query("DELETE FROM shipping WHERE id = :id ");
        $this->db->bind(":id", $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}