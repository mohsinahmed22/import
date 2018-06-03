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


    /*
   * Select All Users
   */
    public function getAllUsers(){
        $query = "SELECT * FROM users ";
        $this->db->query($query);

        $result = $this->db->resultset();
        return $result;
    }


    /*
   * Select Single Users
   */
    public function getUser($id){
        $this->db->query("SELECT * FROM users where id = :id");
        $this->db->bind(':id', $id);

        $result = $this->db->single();

        return $result;
    }


    /*
   * Select Add New User
   */
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

    /*
       * Select Add New User
     */
    public function update($data){
        $this->db
            ->query("UPDATE users SET 
                           username = :username,
                           password = :password,
                           first_name = :first_name,
                           last_name  = :last_name,
                           email = :email,
                           phone = :phone,
                           role = :role,
                           address = :address,
                           is_active = :is_active 
                           where id = :id
                      ");
        $this->db->bind(':id', $data['id']);
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


    /*
   * Check Login and Set Session Data
   */
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



    /*
   * Set Session Data after Login
   */

    public function setUserData($row)
    {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_id'] = $row->id;
        $_SESSION['admin_username'] = $row->username;
        $_SESSION['admin_first_name'] = $row->first_name;
        $_SESSION['admin_last_name'] = $row->last_name;
    }



    /*
   * Check Login Status
   */
    public  function is_logged_in(){
        if(isset($_SESSION['is_logged_in'])){
            return true;
        }else{

            return false;
        }

    }

    /*
    * Delete User
    */
    public function deleteUser($id){
        $this->db->query("DELETE FROM users WHERE id = :id ");
        $this->db->bind(":id", $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


}