<?php

/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 11:51 AM
 */
class User
{
    // Initializing DB
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllUsers(){
        $query = "SELECT * FROM users ";
        $this->db->query($query);

        $result = $this->db->resultset();
        return $result;
    }


    public function register($data){
        $this->db
            ->query("INSERT INTO users 
                      (username, password, first_name, last_name, email, phone, role, address, is_active)
                       VALUE (:username,:password, :first_name, :last_name , :email , :phone, :role, :address, :is_active )");
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':is_active', $data['is_active']);
//        $this->db->bind(':', $data['']);


        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }



}