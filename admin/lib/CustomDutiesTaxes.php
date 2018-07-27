<?php

/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 12:36 PM
 */
class CustomDutiesTaxes
{
    /**
     * @var Database
     */
    private $db;

    /**
     * CustomDutiesTaxes constructor.
     */
    public function __construct()
    {
        $this->db = new Database();
    }


    /**
     * Select All Local Shipping Methods
     * @return array
     */
    public function getAllCustomDutiesTaxes(){
        $query = "SELECT * FROM custom_duties_taxes ";
        $this->db->query($query);

        $result = $this->db->resultset();
        return $result;
    }

    /**
     * Add New Local Shipping Method
     * @param $data
     * @return bool
     */
    public function register($data){
        $this->db
            ->query("INSERT INTO custom_duties_taxes
                      (name, charges)
                       VALUES (:name, :charges)");

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':charges', $data['charges']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    /**
     * Edit Local Shipping
     * @param $data
     * @return bool
     */

    public function update($data){
        $this->db
            ->query("UPDATE custom_duties_taxes SET 
                           charges = :charges,
                           name = :name 
                           WHERE id = :id
                   ");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':charges', $data['charges']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Local Shipping Single
     * @param $id
     * @return Single
     */
    public function getCustomDutiesTaxes($id){
        $this->db->query("SELECT * FROM custom_duties_taxes where id = :id");
        $this->db->bind(':id', $id);

        $result = $this->db->single();

       return $result;
    }

    /**
     * Delete Local Shipping
     * @param $id
     * @return bool
     */

    public function deleteCustomDutiesTaxes($id){
        $this->db->query("DELETE FROM custom_duties_taxes WHERE id = :id ");
        $this->db->bind(":id", $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}