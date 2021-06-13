<?php

class Data_model extends CI_Model
{
    function __construct() {
        parent::__construct();
    }

    function index() {
        
    }
    function insertUser($data=array()){
        $sql = "INSERT INTO data_users (userid, access_token, refresh_token) VALUES (?,?,?) ON DUPLICATE KEY UPDATE access_token = ? , refresh_token = ? , date_add = CURRENT_TIMESTAMP";
        $query = $this->db->query($sql,$data);
        return true;
    }
    
    function getUserInfo($data=array()){
        $sql = "SELECT userid, access_token, refresh_token,date_add FROM data_users where userid = ?";
        $query = $this->db->query($sql,$data);
        return $query->result_array();
    }


    function getdata($data,$userid){
        $sql = "SELECT userid, blockid, timestamp, sleep_mode, activeness, heartrate,working, date, minute, flag_sleep, estado from api_python where date = '".$data."' and userid = ".$userid;
        $query = $this->db->query($sql,$data);
        return $query->result_array();
    } 


}
