<?php

/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 11:51 AM
 */
class Customer extends user
{
    // Initializing DB
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllCustomers(){
        $query = "SELECT * FROM customers ";
        $this->db->query($query);

        $result = $this->db->resultset();
        return $result;
    }

    public function getCustomer($id){
        $this->db->query("SELECT * FROM customers WHERE customer_id = :customer_id");
        $this->db->bind(":customer_id", $id);

        $result = $this->db->single();
        return $result;
    }


    public function register($data){
        $this->db
            ->query("INSERT INTO customers 
                      (first_name, last_name, email, phone, mobile, address, customer_type)
                       VALUE (:first_name, :last_name , :email, :phone, :mobile, :address, :customer_type )");
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':customer_type', $data['customer_type']);
//        $this->db->bind(':', $data['']);


        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }



    public function last_customer_insert_id(){
        return $this->db->last_insert_id();
    }


}