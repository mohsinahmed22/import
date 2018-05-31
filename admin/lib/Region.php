<?php

/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 5/24/2018
 * Time: 10:32 PM
 */
class Region
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    /*
    * Select All Regions
    */
    public function getAllRegion(){
        $this->db->query("SELECT * FROM region");
        $this->db->execute();

        $result = $this->db->resultset();

        return $result;

    }

    /*
    * Add Region
    */
    public function register($data){
        $this->db->query("
                    INSERT INTO region (region_name, region_code, region_cur, region_cur_symbol)
                     VAlUE (:region_name, :region_code, :region_cur, :region_cur_symbol)");
        $this->db->bind(':region_name', $data['region_name']);
        $this->db->bind(':region_code', $data['region_code']);
        $this->db->bind(':region_cur', $data['region_cur']);
        $this->db->bind(':region_cur_symbol', $data['region_cur_symbol']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }


    /*
    * Delete Shipping
    */
    public function deleteRegion($id){
        $this->db->query("DELETE FROM region WHERE id = :id ");
        $this->db->bind(":id", $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


}