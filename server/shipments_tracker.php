<?php
/**
This php script implements 

PHP Version 5+
@Author: Abayomi Apetu
*/


require "DbHandlers.php";

class Shipments_tracker{

    /** 
Object(class) properties.
     Object(class) public properties.
*/ 
    public $id;
    public $order_id;
    public $current_location;
    public $date_arrived;
    public $to_location;
    public $dispatch_date;
    public $date_created;
    public $date_updated;
    public $date_deleted;
    public $status;



    public function _construct(){
        /** Todo, add code for system initialization here!*/ 
    }

    public function save(){
        $db = new DbHandlers();
        $sql = "INSERT INTO shipments_tracker(";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= 'id';    
        }
        if (isset($this->order_id) && $this->order_id!=="" ) {
            $sql.= ',order_id';    
        }
        if (isset($this->current_location) && $this->current_location!=="" ) {
            $sql.= ',current_location';    
        }
        if (isset($this->date_arrived) && $this->date_arrived!=="" ) {
            $sql.= ',date_arrived';    
        }
        if (isset($this->to_location) && $this->to_location!=="" ) {
            $sql.= ',to_location';    
        }
        if (isset($this->dispatch_date) && $this->dispatch_date!=="" ) {
            $sql.= ',dispatch_date';    
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
        if (isset($this->order_id) && $this->order_id!=="") {
            $sql.=",'{$this->order_id}'";    
        }
        if (isset($this->current_location) && $this->current_location!=="") {
            $sql.=",'{$this->current_location}'";    
        }
        if (isset($this->date_arrived) && $this->date_arrived!=="") {
            $sql.=",'".str_replace(".000Z", "", str_replace("T", " ", $this->date_arrived))."'";    
        }
        if (isset($this->to_location) && $this->to_location!=="") {
            $sql.=",'{$this->to_location}'";    
        }
        if (isset($this->dispatch_date) && $this->dispatch_date!=="") {
            $sql.=",'".str_replace(".000Z", "", str_replace("T", " ", $this->dispatch_date))."'";    
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
        $sql = "UPDATE shipments_tracker SET ";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= " id = '{$this->id}'";    
        }
        if (isset($this->order_id) && $this->order_id!=="" ) {
            $sql.= ", order_id = '{$this->order_id}'";    
        }
        if (isset($this->current_location) && $this->current_location!=="" ) {
            $sql.= ", current_location = '{$this->current_location}'";    
        }
        if (isset($this->date_arrived) && $this->date_arrived!=="" ) {
            $sql.= ", date_arrived = '".str_replace(".000Z", "", str_replace("T", " ", $this->date_arrived))."'";    
        }
        if (isset($this->to_location) && $this->to_location!=="" ) {
            $sql.= ", to_location = '{$this->to_location}'";    
        }
        if (isset($this->dispatch_date) && $this->dispatch_date!=="" ) {
            $sql.= ", dispatch_date = '".str_replace(".000Z", "", str_replace("T", " ", $this->dispatch_date))."'";    
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
            $sql = "SELECT * from shipments_tracker order by id DESC";
        } else {
        $sql = "SELECT * from shipments_tracker WHERE $critcol ='{$critval}'";
        }
        $datasource = $db->getRowAssoc($sql);
        return $datasource;
    }

    public  function delete($critcol, $critval){
        $db = new DbHandlers();
        $sql = "DELETE FROM shipments_tracker WHERE $critcol ='{$critval}'";
        $d_out = $db->executeQuery($sql);
        return $d_out;
    }
}