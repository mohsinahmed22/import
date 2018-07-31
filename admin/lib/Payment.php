<?php

/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/23/2018
 * Time: 11:33 AM
 */
class Payment
{

    /**
     * @var Database
     */
    private $db;

    /**
     * Setting constructor.
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Get All Order Payments
     * @return mixed
     */
    public function getOrderPayment($id){
        $this->db->query("SELECT * FROM payments");
        $this->db->execute();

        $results = $this->db->resultset();

        if($results){
            return $results;
        }else{
            return false;
        }
    }




}