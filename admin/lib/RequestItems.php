<?php

/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 12:37 PM
 */
class RequestItems
{
    // Initializing DB
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllRequestItems(){
        $query = "SELECT * FROM request_items ";
        $this->db->query($query);

        $result = $this->db->resultset();
        return $result;
    }


    public function getOrderitems($id){
        $this->db->query("SELECT * FROM requested_items WHERE request_id = :id");
        $this->db->bind(":id", $id);

        $result = $this->db->resultset();
        return $result;
    }


    public function register($data){
        $this->db
            ->query("INSERT INTO requested_items 
                      (customer_id, request_id, brand_id, shipping_id, req_item_url, req_item_qty, req_item_price, req_item_total)
                       VALUE (:customer_id, :request_id , :brand_id, :shipping_id, :req_item_url, :req_item_qty, :req_item_price, :req_item_total)");
        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':request_id', $data['request_id']);
        $this->db->bind(':brand_id', $data['brand_id']);
        $this->db->bind(':shipping_id', $data['shipping_id']);
        $this->db->bind(':req_item_url', $data['req_item_url']);
        $this->db->bind(':req_item_qty', $data['req_item_qty']);
        $this->db->bind(':req_item_price', $data['req_item_price']);
        $this->db->bind(':req_item_total', $data['req_item_total']);

//        $this->db->bind(':', $data['']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function last_request_insert_id(){
        return $this->db->last_insert_id();
    }


}