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

    /*
    * Select All Brand
    */
    public function getAllBrands(){
        $query = "SELECT * FROM brands ";
        $this->db->query($query);

        $result = $this->db->resultset();
        return $result;
    }
    /*
   * Select Limited Brands
   */
    public function getLimitBrands($limit = 4){
        $query = "SELECT * FROM brands LIMIT $limit";
        $this->db->query($query);

        $result = $this->db->resultset();
        return $result;
    }



    /*
    * Select Single Brand
    */
    public function getBrand($id){
        $this->db->query("SELECT * FROM brands where id = :id");
        $this->db->bind(':id', $id);

        $result = $this->db->single();
        return $result;
    }

    /*
    * Add New Brand to Database
    */
    public function register($data){
        $this->db->query("
                    INSERT INTO brands (brandname, img, url, standard_charges, pcs_limit, vat_charges, region_name)
                    values (:brandname, :img, :url, :standard_charges, :pcs_limit, :vat_charges, :region_name)
        ");
        $this->db->bind(":brandname", $data['brandname']);
        $this->db->bind(":img", $data['img']);
        $this->db->bind(":url", $data['url']);
        $this->db->bind(":standard_charges", $data['standard_charges']);
        $this->db->bind(":pcs_limit", $data['pcs_limit']);
        $this->db->bind(":vat_charges", $data['vat_charges']);
        $this->db->bind(":region_name", $data['region_name']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    /*
     * Edit User
     */

    public function update($data){
        $this->db->query("
                    UPDATE brands SET 
                    brandname = :brandname,
                    url = :url,
                    standard_charges = :standard_charges,
                    pcs_limit = :pcs_limit,
                    vat_charges = :vat_charges,
                    region_name = :region_name
                    where id = :id
                    ");
        $this->db->bind(":id", $data['id']);
        $this->db->bind(":brandname", $data['brandname']);
//        $this->db->bind(":img", $data['img']);
        $this->db->bind(":url", $data['url']);
        $this->db->bind(":standard_charges", $data['standard_charges']);
        $this->db->bind(":pcs_limit", $data['pcs_limit']);
        $this->db->bind(":vat_charges", $data['vat_charges']);
        $this->db->bind(":region_name", $data['region_name']);


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
                header("Location: brands.php");
//                redirect('brands.php', $_FILES["brandlogo"]["error"], 'error');
            } else {
                if (file_exists("images/brandlogo/" . $_FILES["brandlogo"]["name"])) {
//                    redirect('brands.php', 'File already exists', 'error');
                    header("Location: brands.php");
                } else {
                    move_uploaded_file($_FILES["brandlogo"]["tmp_name"],
                        "images/brandlogo/" . $_FILES["brandlogo"]["name"]);

                    return true;
                }
            }
        } else {
//            redirect('register.php', 'Invalid File Type!', 'error');
        }
    }




    /*
    * Select Brand via Region
    */

    public function SelectBrandsRegion(){
        $this->db->query("SELECT * FROM brands inner join region on brands.region_name = region.region_code ");
        $results = $this->db->resultset();
        $results = $this->create_region_brands($results);
//        print_r($results);
        return $results;
    }


    public function create_region_brands($results){
        $regBrands = array();
        if($results):

            foreach ($results as $brand){
                if (!array_key_exists($brand->region_name,$regBrands)):
                    $regBrands[$brand->region_name] = array();
                    array_push($regBrands[$brand->region_name],$brand);
                else:
                    array_push($regBrands[$brand->region_name],$brand);
                endif;
            }
        endif;
//        print_r($regBrands);
        return $regBrands;
    }



    /*
    * Delete Brand
    */

    public function deleteBrand($id){
        $this->db->query("DELETE FROM brands WHERE id = :id ");
        $this->db->bind(":id", $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}