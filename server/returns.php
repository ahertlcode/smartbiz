<?php
/**
This php script implements 

PHP Version 5+
@Author: Abayomi Apetu
*/


require "DbHandlers.php";

class Return{

    /** 
Object(class) properties.
     Object(class) public properties.
*/ 
    public $id;
    public $return_type;
    public $return_date;
    public $reason;
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
        $sql = "INSERT INTO returns(";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= 'id';    
        }
        if (isset($this->return_type) && $this->return_type!=="" ) {
            $sql.= ',return_type';    
        }
        if (isset($this->return_date) && $this->return_date!=="" ) {
            $sql.= ',return_date';    
        }
        if (isset($this->reason) && $this->reason!=="" ) {
            $sql.= ',reason';    
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
        if (isset($this->return_type) && $this->return_type!=="") {
            $sql.=",'{$this->return_type}'";    
        }
        if (isset($this->return_date) && $this->return_date!=="") {
            $sql.=",'".str_replace(".000Z", "", str_replace("T", " ", $this->return_date))."'";    
        }
        if (isset($this->reason) && $this->reason!=="") {
            $sql.=",'{$this->reason}'";    
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
        $sql = "UPDATE returns SET ";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= " id = '{$this->id}'";    
        }
        if (isset($this->return_type) && $this->return_type!=="" ) {
            $sql.= ", return_type = '{$this->return_type}'";    
        }
        if (isset($this->return_date) && $this->return_date!=="" ) {
            $sql.= ", return_date = '".str_replace(".000Z", "", str_replace("T", " ", $this->return_date))."'";    
        }
        if (isset($this->reason) && $this->reason!=="" ) {
            $sql.= ", reason = '{$this->reason}'";    
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
            $sql = "SELECT * from returns order by id DESC";
        } else {
        $sql = "SELECT * from returns WHERE $critcol ='{$critval}'";
        }
        $datasource = $db->getRowAssoc($sql);
        return $datasource;
    }

    public  function delete($critcol, $critval){
        $db = new DbHandlers();
        $sql = "DELETE FROM returns WHERE $critcol ='{$critval}'";
        $d_out = $db->executeQuery($sql);
        return $d_out;
    }
}