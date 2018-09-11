<?php
/**
This php script implements 

PHP Version 5+
@Author: Abayomi Apetu
*/


require "DbHandlers.php";

class User{

    /** 
Object(class) properties.
     Object(class) public properties.
*/ 
    public $id;
    public $last_name;
    public $first_name;
    public $middle_name;
    public $e_mail;
    public $mobile_phone;
    public $address;
    public $date_registered;
    public $lastlogin;
    public $first_login_ip;
    public $last_login_ip;
    public $role;
    public $date_created;
    public $date_updated;
    public $date_deleted;
    public $status;



    public function _construct(){
        /** Todo, add code for system initialization here!*/ 
    }

    public function save(){
        $db = new DbHandlers();
        $sql = "INSERT INTO users(";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= 'id';    
        }
        if (isset($this->last_name) && $this->last_name!=="" ) {
            $sql.= ',last_name';    
        }
        if (isset($this->first_name) && $this->first_name!=="" ) {
            $sql.= ',first_name';    
        }
        if (isset($this->middle_name) && $this->middle_name!=="" ) {
            $sql.= ',middle_name';    
        }
        if (isset($this->e_mail) && $this->e_mail!=="" ) {
            $sql.= ',e_mail';    
        }
        if (isset($this->mobile_phone) && $this->mobile_phone!=="" ) {
            $sql.= ',mobile_phone';    
        }
        if (isset($this->address) && $this->address!=="" ) {
            $sql.= ',address';    
        }
        if (isset($this->date_registered) && $this->date_registered!=="" ) {
            $sql.= ',date_registered';    
        }
        if (isset($this->lastlogin) && $this->lastlogin!=="" ) {
            $sql.= ',lastlogin';    
        }
        if (isset($this->first_login_ip) && $this->first_login_ip!=="" ) {
            $sql.= ',first_login_ip';    
        }
        if (isset($this->last_login_ip) && $this->last_login_ip!=="" ) {
            $sql.= ',last_login_ip';    
        }
        if (isset($this->role) && $this->role!=="" ) {
            $sql.= ',role';    
        }
        if (isset($this->date_created) && $this->date_created!=="" ) {
            $sql.= ',date_created';    
        }
        if (isset($this->date_updated) && $this->date_updated!=="" ) {
            $sql.= ',date_updated';    
        }
        if (isset($this->date_deleted) && $this->date_deleted!=="" ) {
            $sql.= ',date_deleted';    
        }
        if (isset($this->status) && $this->status!=="" ) {
            $sql.= ',status';    
        }
        $sql.= ") VALUES (";
        if (isset($this->id) && $this->id!=="") {
            $sql.="'{$this->id}'";    
        }
        if (isset($this->last_name) && $this->last_name!=="") {
            $sql.=",'{$this->last_name}'";    
        }
        if (isset($this->first_name) && $this->first_name!=="") {
            $sql.=",'{$this->first_name}'";    
        }
        if (isset($this->middle_name) && $this->middle_name!=="") {
            $sql.=",'{$this->middle_name}'";    
        }
        if (isset($this->e_mail) && $this->e_mail!=="") {
            $sql.=",'{$this->e_mail}'";    
        }
        if (isset($this->mobile_phone) && $this->mobile_phone!=="") {
            $sql.=",'{$this->mobile_phone}'";    
        }
        if (isset($this->address) && $this->address!=="") {
            $sql.=",'{$this->address}'";    
        }
        if (isset($this->date_registered) && $this->date_registered!=="") {
            $sql.=",'".str_replace(".000Z", "", str_replace("T", " ", $this->date_registered))."'";    
        }
        if (isset($this->lastlogin) && $this->lastlogin!=="") {
            $sql.=",'".str_replace(".000Z", "", str_replace("T", " ", $this->lastlogin))."'";    
        }
        if (isset($this->first_login_ip) && $this->first_login_ip!=="") {
            $sql.=",'{$this->first_login_ip}'";    
        }
        if (isset($this->last_login_ip) && $this->last_login_ip!=="") {
            $sql.=",'{$this->last_login_ip}'";    
        }
        if (isset($this->role) && $this->role!=="") {
            $sql.=",'{$this->role}'";    
        }
        if (isset($this->date_created) && $this->date_created!=="") {
            $sql.=",'".str_replace(".000Z", "", str_replace("T", " ", $this->date_created))."'";    
        }
        if (isset($this->date_updated) && $this->date_updated!=="") {
            $sql.=",'".str_replace(".000Z", "", str_replace("T", " ", $this->date_updated))."'";    
        }
        if (isset($this->date_deleted) && $this->date_deleted!=="") {
            $sql.=",'".str_replace(".000Z", "", str_replace("T", " ", $this->date_deleted))."'";    
        }
        if (isset($this->status) && $this->status!=="") {
            $sql.=",'{$this->status}'";    
        }
        $sql.=")";
        $sql = str_replace("(,", "(", $sql);
        $savein = $db->executeQuery($sql);
        return $savein;
    }

    public function update($pvcol, $pval){
        $db = new DbHandlers();
        $sql = "UPDATE users SET ";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= " id = '{$this->id}'";    
        }
        if (isset($this->last_name) && $this->last_name!=="" ) {
            $sql.= ", last_name = '{$this->last_name}'";    
        }
        if (isset($this->first_name) && $this->first_name!=="" ) {
            $sql.= ", first_name = '{$this->first_name}'";    
        }
        if (isset($this->middle_name) && $this->middle_name!=="" ) {
            $sql.= ", middle_name = '{$this->middle_name}'";    
        }
        if (isset($this->e_mail) && $this->e_mail!=="" ) {
            $sql.= ", e_mail = '{$this->e_mail}'";    
        }
        if (isset($this->mobile_phone) && $this->mobile_phone!=="" ) {
            $sql.= ", mobile_phone = '{$this->mobile_phone}'";    
        }
        if (isset($this->address) && $this->address!=="" ) {
            $sql.= ", address = '{$this->address}'";    
        }
        if (isset($this->date_registered) && $this->date_registered!=="" ) {
            $sql.= ", date_registered = '".str_replace(".000Z", "", str_replace("T", " ", $this->date_registered))."'";    
        }
        if (isset($this->lastlogin) && $this->lastlogin!=="" ) {
            $sql.= ", lastlogin = '".str_replace(".000Z", "", str_replace("T", " ", $this->lastlogin))."'";    
        }
        if (isset($this->first_login_ip) && $this->first_login_ip!=="" ) {
            $sql.= ", first_login_ip = '{$this->first_login_ip}'";    
        }
        if (isset($this->last_login_ip) && $this->last_login_ip!=="" ) {
            $sql.= ", last_login_ip = '{$this->last_login_ip}'";    
        }
        if (isset($this->role) && $this->role!=="" ) {
            $sql.= ", role = '{$this->role}'";    
        }
        if (isset($this->date_created) && $this->date_created!=="" ) {
            $sql.= ", date_created = '".str_replace(".000Z", "", str_replace("T", " ", $this->date_created))."'";    
        }
        if (isset($this->date_updated) && $this->date_updated!=="" ) {
            $sql.= ", date_updated = '".str_replace(".000Z", "", str_replace("T", " ", $this->date_updated))."'";    
        }
        if (isset($this->date_deleted) && $this->date_deleted!=="" ) {
            $sql.= ", date_deleted = '".str_replace(".000Z", "", str_replace("T", " ", $this->date_deleted))."'";    
        }
        if (isset($this->status) && $this->status!=="" ) {
            $sql.= ", status = '{$this->status}'";    
        }
        $sql .=  " WHERE $pvcol = '$pval'";
        $sql = str_replace("SET ,", "SET ", $sql);
        $upd = $db->executeQuery($sql);
        return $upd;
    }

    public function view($critcol=null, $critval=null) {
        $db = new DbHandlers();
        if(is_null($critcol)){
            $sql = "SELECT * from users order by id DESC";
        } else {
        $sql = "SELECT * from users WHERE $critcol ='{$critval}'";
        }
        $datasource = $db->getRowAssoc($sql);
        return $datasource;
    }



    public  function delete($critcol, $critval){
        $db = new DbHandlers();
        $sql = "DELETE FROM users WHERE $critcol ='{$critval}'";
        $d_out = $db->executeQuery($sql);
        return $d_out;
    }
}