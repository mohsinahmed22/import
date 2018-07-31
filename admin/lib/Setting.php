<?php

/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/23/2018
 * Time: 11:33 AM
 */
class Setting
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
     * Get All Settings
     * @return mixed
     */
    public function getAllSettings(){
        $this->db->query("SELECT * FROM settings");
        $this->db->execute();

        $results = $this->db->resultset();

        return $results;
    }


    /**
     * Get All slides
     * @return mixed
     */
    public function getAllSildes(){
        $this->db->query("SELECT * FROM sliders");
        $this->db->execute();

        $results = $this->db->resultset();

        return $results;
    }



    /**
     * Assign Settings
     * @param $data
     * @return array
     */
    public function AssignSetting($data){
        $DataArray = array();
        foreach ($data as $v){
            $DataArray[$v->setting_name] = $v->setting_value;
        }
        return $DataArray;
    }

    public function  convert_detail_array($data){


        foreach ($data as $k => $v){
                $DataArray[$k] = array(
                    'setting_name' => $k,
                    'setting_value' => $v );
        }

        return (object)$DataArray;

    }


    /**
     * Setting Update
     * @param $data
     * @return bool
     */
    public function update($data){
        $this->db ->query("UPDATE settings SET 
                           setting_value = :setting_value 
                           where setting_name = :setting_name
                   ");
        $this->db->bind(':setting_name', $data['setting_name']);
        $this->db->bind(':setting_value', $data['setting_value']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }



    /*
* Add New Brand to Database
*/
    public function registerSlide($data){
        $this->db->query("
                    INSERT INTO sliders (img_path, img_title)
                    values (:img_path, :img_title)
        ");
        $this->db->bind(":img_path", $data['img_path']);
        $this->db->bind(":img_title", $data['img_title']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    /**
     * Add New Slide
     * @return bool
     */
    public function uploadslide(){
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["img_path"]["name"]);
        $extension = end($temp);
        if ((($_FILES["img_path"]["type"] == "image/gif")
                || ($_FILES["img_path"]["type"] == "image/jpeg")
                || ($_FILES["img_path"]["type"] == "image/jpg")
                || ($_FILES["img_path"]["type"] == "image/pjpeg")
                || ($_FILES["img_path"]["type"] == "image/x-png")
                || ($_FILES["img_path"]["type"] == "image/png"))
            && ($_FILES["img_path"]["size"] < 100000)
            && in_array($extension, $allowedExts)) {
            if ($_FILES["img_path"]["error"] > 0) {
                redirect("setting.php");
//                redirect('brands.php', $_FILES["brandlogo"]["error"], 'error');
            } else {
                if (file_exists("../assets/images/sliders/" . $_FILES["img_path"]["name"])) {
//                    redirect('brands.php', 'File already exists', 'error');
                    redirect("setting.php");
                } else {
                    move_uploaded_file($_FILES["img_path"]["tmp_name"],
                        "../assets/images/sliders/" . $_FILES["img_path"]["name"]);
                    return true;
                }
            }
        } else {
//            redirect('register.php', 'Invalid File Type!', 'error');
        }
    }



    public function deleteSlide($id){
        $this->db->query("DELETE FROM sliders WHERE id = :id ");
        $this->db->bind(":id", $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }



}