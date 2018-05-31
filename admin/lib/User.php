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
    public $is_logged_in = false;

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

    public function login($username, $password){
        $this->db->query("SELECT * FROM users WHERE 
                                 username = :username AND 
                                 password =:password
                                 ");
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $row = $this->db->single();

        if($this->db->rowCount()> 0 ){
            $this->setUserData($row);
            return true;
        }else{

            return false;
        }
    }

    public function setUserData($row)
    {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_id'] = $row->id;
        $_SESSION['admin_username'] = $row->username;
        $_SESSION['admin_first_name'] = $row->first_name;
        $_SESSION['admin_last_name'] = $row->last_name;
    }
    public  function is_logged_in(){
        if(isset($_SESSION['is_logged_in'])){
            return true;
        }else{

            return false;
        }

    }

}