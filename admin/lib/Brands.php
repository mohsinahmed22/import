<?php

/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 12:36 PM
 */
class Brands
{
     // Initializing DB
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllBrands(){
        $query = "SELECT * FROM brands ";
        $this->db->query($query);

        $result = $this->db->resultset();
        return $result;
    }

    public function register($data){
        $this->db->query("
                    INSERT INTO brands (brandname, img, url)
                    values (:brandname, :img, :url)
        ");
        $this->db->bind(":brandname", $data['brandname']);
        $this->db->bind(":img", $data['img']);
        $this->db->bind(":url", $data['url']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    /*
         * Upload User brandlogo
         */
    public function uploadlogo(){
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["brandlogo"]["name"]);
        $extension = end($temp);
        if ((($_FILES["brandlogo"]["type"] == "image/gif")
                || ($_FILES["brandlogo"]["type"] == "image/jpeg")
                || ($_FILES["brandlogo"]["type"] == "image/jpg")
                || ($_FILES["brandlogo"]["type"] == "image/pjpeg")
                || ($_FILES["brandlogo"]["type"] == "image/x-png")
                || ($_FILES["brandlogo"]["type"] == "image/png"))
            && ($_FILES["brandlogo"]["size"] < 100000)
            && in_array($extension, $allowedExts)) {
            if ($_FILES["brandlogo"]["error"] > 0) {
                redirect('brands.php', $_FILES["brandlogo"]["error"], 'error');
            } else {
                if (file_exists("images/brandlogo/" . $_FILES["brandlogo"]["name"])) {
                    redirect('brands.php', 'File already exists', 'error');
                } else {
                    move_uploaded_file($_FILES["brandlogo"]["tmp_name"],
                        "images/brandlogo/" . $_FILES["brandlogo"]["name"]);

                    return true;
                }
            }
        } else {
            redirect('register.php', 'Invalid File Type!', 'error');
        }
    }



}