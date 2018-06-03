<?php

/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 12:37 PM
 */
class Order
{
    // Initializing DB
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    /*
    * Get All Orders
    */
    public function getAllOrders(){
        $query = "SELECT * FROM request ";
        $this->db->query($query);

        $result = $this->db->resultset();
        return $result;
    }

    /*
   * Get All Orders
   */
    public function getAllCustomerOrders($customer_id){
        $query = "SELECT * FROM request where customer_id = :customer_id";
        $this->db->query($query);
        $this->db->bind(':customer_id', $customer_id);

        $result = $this->db->resultset();
        return $result;
    }

    /*
     * Get Latest Orders
     */
    public function getlatestOrders(){
        $query = "SELECT * FROM request ORDER BY id DESC LIMIT 5";
        $this->db->query($query);


        $result = $this->db->resultset();
        return $result;
    }


    /*
    * Get Order Detail
    */
    public function getOrderDetail($id){
        $this->db->query("SELECT * FROM request WHERE id = :id");
        $this->db->bind(":id", $id);

        $result = $this->db->single();
        return $result;
    }


    /*
    * Add Orders
    */
    public function register($data){
        $this->db
            ->query("INSERT INTO request 
                      (customer_id, request_total_amount, request_total_qty, request_total_shipping_amount, request_total_product_amount, request_date)
                       VALUE (:customer_id, :request_total_amount , :request_total_qty, :request_total_shipping_amount, :request_total_product_amount, NOW())");
        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':request_total_amount', $data['request_total_amount']);
        $this->db->bind(':request_total_qty', $data['request_total_qty']);
        $this->db->bind(':request_total_shipping_amount', $data['request_total_shipping_amount']);
        $this->db->bind(':request_total_product_amount', $data['request_total_product_amount']);
//        $this->db->bind(':', $data['']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    /*
    * Get Last Inserted Id
    */
    public function last_request_insert_id(){
        return $this->db->last_insert_id();
    }


}