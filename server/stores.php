<?php
/**
This php script implements 

PHP Version 5+
@Author: Abayomi Apetu
*/


require "DbHandlers.php";

class Store{

    /** 
Object(class) properties.
     Object(class) public properties.
*/ 
    public $id;
    public $store_name;
    public $store_addr;
    public $store_onwer;
    public $created_date;
    public $created_by;
    public $date_created;
    public $date_updated;
    public $date_deleted;
    public $status;



    public function _construct(){
        /** Todo, add code for system initialization here!*/ 
    }

    public function save(){
        $db = new DbHandlers();
        $sql = "INSERT INTO stores(";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= 'id';    
        }
        if (isset($this->store_name) && $this->store_name!=="" ) {
            $sql.= ',store_name';    
        }
        if (isset($this->store_addr) && $this->store_addr!=="" ) {
            $sql.= ',store_addr';    
        }
        if (isset($this->store_onwer) && $this->store_onwer!=="" ) {
            $sql.= ',store_onwer';    
        }
        if (isset($this->created_date) && $this->created_date!=="" ) {
            $sql.= ',created_date';    
        }
        if (isset($this->created_by) && $this->created_by!=="" ) {
            $sql.= ',created_by';    
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
        if (isset($this->store_name) && $this->store_name!=="") {
            $sql.=",'{$this->store_name}'";    
        }
        if (isset($this->store_addr) && $this->store_addr!=="") {
            $sql.=",'{$this->store_addr}'";    
        }
        if (isset($this->store_onwer) && $this->store_onwer!=="") {
            $sql.=",'{$this->store_onwer}'";    
        }
        if (isset($this->created_date) && $this->created_date!=="") {
            $sql.=",'".str_replace(".000Z", "", str_replace("T", " ", $this->created_date))."'";    
        }
        if (isset($this->created_by) && $this->created_by!=="") {
            $sql.=",'{$this->created_by}'";    
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
        $sql = "UPDATE stores SET ";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= " id = '{$this->id}'";    
        }
        if (isset($this->store_name) && $this->store_name!=="" ) {
            $sql.= ", store_name = '{$this->store_name}'";    
        }
        if (isset($this->store_addr) && $this->store_addr!=="" ) {
            $sql.= ", store_addr = '{$this->store_addr}'";    
        }
        if (isset($this->store_onwer) && $this->store_onwer!=="" ) {
            $sql.= ", store_onwer = '{$this->store_onwer}'";    
        }
        if (isset($this->created_date) && $this->created_date!=="" ) {
            $sql.= ", created_date = '".str_replace(".000Z", "", str_replace("T", " ", $this->created_date))."'";    
        }
        if (isset($this->created_by) && $this->created_by!=="" ) {
            $sql.= ", created_by = '{$this->created_by}'";    
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
            $sql = "SELECT * from stores order by id DESC";
        } else {
        $sql = "SELECT * from stores WHERE $critcol ='{$critval}'";
        }
        $datasource = $db->getRowAssoc($sql);
        return $datasource;
    }

    public  function delete($critcol, $critval){
        $db = new DbHandlers();
        $sql = "DELETE FROM stores WHERE $critcol ='{$critval}'";
        $d_out = $db->executeQuery($sql);
        return $d_out;
    }
}