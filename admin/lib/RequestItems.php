<?php

/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 12:37 PM
 */
class RequestItems
{
    /**
     * @var Database
     */
    private $db;

    /**
     * RequestItems constructor.
     */
    public function __construct()
    {
        $this->db = new Database();
    }


    /**
     * Get All Requested Items
     * @return mixed
     */
    public function getAllRequestItems(){
        $query = "SELECT * FROM requested_items ";
        $this->db->query($query);

        $result = $this->db->resultset();
        return $result;
    }

    /**
     * Get Items in Order by id
     * @param $id
     * @return mixed
     */
    public function getOrderitems($id){
        $this->db->query("SELECT * FROM requested_items WHERE request_id = :id");
        $this->db->bind(":id", $id);

        $result = $this->db->resultset();
        return $result;
    }

    /**
     * Get Brands Order Count
     * @return array
     */
    public function getBrandsOrderCount(){
        $query = "SELECT brandname FROM requested_items ";
        $this->db->query($query);
        $result = $this->db->resultset();
        $arr = array();
        $count = 0;
        for ($i = 0; $i < $this->db->rowCount(); $i++){
                if(!isset($arr[$result[$i]->brandname])){
                    $count = 1;
                    $arr[$result[$i]->brandname] = $count;
                }else {
                    $arr[$result[$i]->brandname] = $count+1;

                }

        }
        return $arr;
    }

    /**
     * Add new Requested Items
     * @param $data
     * @return bool
     */
    public function register($data){
        $this->db
            ->query("INSERT INTO requested_items 
                      (customer_id, request_id, brandname, shipping_entity_cost, req_item_url, req_item_qty, req_item_color, req_item_size, req_item_description, standard_charges, region_name, req_item_price, req_item_total, vat_charges)
                       VALUE (:customer_id, :request_id , :brandname, :shipping_entity_cost, :req_item_url, :req_item_qty, :req_item_color, :req_item_size, :req_item_description, :standard_charges, :region_name, :req_item_price, :req_item_total, :vat_charges)");
        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':request_id', $data['request_id']);
        $this->db->bind(':brandname', $data['brandname']);
        $this->db->bind(':shipping_entity_cost', $data['shipping_entity_cost']);
        $this->db->bind(':req_item_url', $data['req_item_url']);
        $this->db->bind(':req_item_qty', $data['req_item_qty']);
        $this->db->bind(':req_item_color', $data['req_item_color']);
        $this->db->bind(':req_item_size', $data['req_item_size']);
        $this->db->bind(':req_item_description', $data['req_item_description']);
        $this->db->bind(':standard_charges', $data['standard_charges']);
        $this->db->bind(':region_name', $data['region_name']);
        $this->db->bind(':req_item_price', $data['req_item_price']);
        $this->db->bind(':req_item_total', $data['req_item_total']);
        $this->db->bind(':vat_charges', $data['vat_charges']);

//        $this->db->bind(':', $data['']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    /**
     * Get Id of last inserted Requested Item
     * @return string
     */
    public function last_request_insert_id(){
        return $this->db->last_insert_id();
    }


}