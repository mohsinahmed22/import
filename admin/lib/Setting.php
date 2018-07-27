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

}