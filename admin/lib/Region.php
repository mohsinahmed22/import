<?php

/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 5/24/2018
 * Time: 10:32 PM
 */
class Region
{

    /**
     * @var Database
     */
    public $db;

    /**
     * Region constructor.
     */
    public function __construct()
    {
        $this->db = new Database();
    }


    /**
     * Select All Region
     * @return mixed
     */
    public function getAllRegion(){
        $this->db->query("SELECT * FROM region");
        $this->db->execute();

        $result = $this->db->resultset();

        return $result;

    }


    /**
     * Select Region by Id
     * @param $id
     * @return mixed
     */
    public function getRegion($id){
        $this->db->query("SELECT * FROM region where id = :id");
        $this->db->bind(':id', $id);

        $result = $this->db->single();
        return $result;
    }


    /**
     * Add new Region
     * @param $data
     * @return bool
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


    /**
     * Update New Region
     * @param $data
     * @return bool
     */
    public function update($data){
        $this->db->query("
                    UPDATE region SET 
                    region_code = :region_code,
                    region_name = :region_name,
                    region_cur = :region_cur,
                    region_cur_symbol = :region_cur_symbol 
                    where id = :id ");
        $this->db->bind(':id', $data['id']);
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


    /**
     * Delete Region
     * @param $id
     * @return bool
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