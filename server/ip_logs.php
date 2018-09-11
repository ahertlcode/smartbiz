<?php
/**
This php script implements 

PHP Version 5+
@Author: Abayomi Apetu
*/


require "DbHandlers.php";

class Ip_log{

    /** 
Object(class) properties.
     Object(class) public properties.
*/ 
    public $id;
    public $ip;
    public $system_id;
    public $browser_type;
    public $os_type;
    public $location;
    public $log_date;



    public function _construct(){
        /** Todo, add code for system initialization here!*/ 
    }

    public function save(){
        $db = new DbHandlers();
        $sql = "INSERT INTO ip_logs(";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= 'id';    
        }
        if (isset($this->ip) && $this->ip!=="" ) {
            $sql.= ',ip';    
        }
        if (isset($this->system_id) && $this->system_id!=="" ) {
            $sql.= ',system_id';    
        }
        if (isset($this->browser_type) && $this->browser_type!=="" ) {
            $sql.= ',browser_type';    
        }
        if (isset($this->os_type) && $this->os_type!=="" ) {
            $sql.= ',os_type';    
        }
        if (isset($this->location) && $this->location!=="" ) {
            $sql.= ',location';    
        }
        if (isset($this->log_date) && $this->log_date!=="" ) {
            $sql.= ',log_date';    
        }
        $sql.= ") VALUES (";
        if (isset($this->id) && $this->id!=="") {
            $sql.="'{$this->id}'";    
        }
        if (isset($this->ip) && $this->ip!=="") {
            $sql.=",'{$this->ip}'";    
        }
        if (isset($this->system_id) && $this->system_id!=="") {
            $sql.=",'{$this->system_id}'";    
        }
        if (isset($this->browser_type) && $this->browser_type!=="") {
            $sql.=",'{$this->browser_type}'";    
        }
        if (isset($this->os_type) && $this->os_type!=="") {
            $sql.=",'{$this->os_type}'";    
        }
        if (isset($this->location) && $this->location!=="") {
            $sql.=",'{$this->location}'";    
        }
        if (isset($this->log_date) && $this->log_date!=="") {
            $sql.=",'".str_replace(".000Z", "", str_replace("T", " ", $this->log_date))."'";    
        }
        $sql.=")";
        $sql = str_replace("(,", "(", $sql);
        $savein = $db->executeQuery($sql);
        return $savein;
    }

    public function update($pvcol, $pval){
        $db = new DbHandlers();
        $sql = "UPDATE ip_logs SET ";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= " id = '{$this->id}'";    
        }
        if (isset($this->ip) && $this->ip!=="" ) {
            $sql.= ", ip = '{$this->ip}'";    
        }
        if (isset($this->system_id) && $this->system_id!=="" ) {
            $sql.= ", system_id = '{$this->system_id}'";    
        }
        if (isset($this->browser_type) && $this->browser_type!=="" ) {
            $sql.= ", browser_type = '{$this->browser_type}'";    
        }
        if (isset($this->os_type) && $this->os_type!=="" ) {
            $sql.= ", os_type = '{$this->os_type}'";    
        }
        if (isset($this->location) && $this->location!=="" ) {
            $sql.= ", location = '{$this->location}'";    
        }
        if (isset($this->log_date) && $this->log_date!=="" ) {
            $sql.= ", log_date = '".str_replace(".000Z", "", str_replace("T", " ", $this->log_date))."'";    
        }
        $sql .=  " WHERE $pvcol = '$pval'";
        $sql = str_replace("SET ,", "SET ", $sql);
        $upd = $db->executeQuery($sql);
        return $upd;
    }

    public function view($critcol=null, $critval=null) {
        $db = new DbHandlers();
        if(is_null($critcol)){
            $sql = "SELECT * from ip_logs order by id DESC";
        } else {
        $sql = "SELECT * from ip_logs WHERE $critcol ='{$critval}'";
        }
        $datasource = $db->getRowAssoc($sql);
        return $datasource;
    }

    public  function delete($critcol, $critval){
        $db = new DbHandlers();
        $sql = "DELETE FROM ip_logs WHERE $critcol ='{$critval}'";
        $d_out = $db->executeQuery($sql);
        return $d_out;
    }
}