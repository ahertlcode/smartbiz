<?php
/**
This php script implements 

PHP Version 5+
@Author: Abayomi Apetu
*/


require "DbHandlers.php";

class Purchases_ledger{

    /** 
Object(class) properties.
     Object(class) public properties.
*/ 
    public $id;
    public $trans_id;
    public $trans_ref;
    public $description;
    public $quantity;
    public $amount;
    public $total;
    public $trans_date;
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
        $sql = "INSERT INTO purchases_ledger(";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= 'id';    
        }
        if (isset($this->trans_id) && $this->trans_id!=="" ) {
            $sql.= ',trans_id';    
        }
        if (isset($this->trans_ref) && $this->trans_ref!=="" ) {
            $sql.= ',trans_ref';    
        }
        if (isset($this->description) && $this->description!=="" ) {
            $sql.= ',description';    
        }
        if (isset($this->quantity) && $this->quantity!=="" ) {
            $sql.= ',quantity';    
        }
        if (isset($this->amount) && $this->amount!=="" ) {
            $sql.= ',amount';    
        }
        if (isset($this->total) && $this->total!=="" ) {
            $sql.= ',total';    
        }
        if (isset($this->trans_date) && $this->trans_date!=="" ) {
            $sql.= ',trans_date';    
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
        if (isset($this->trans_id) && $this->trans_id!=="") {
            $sql.=",'{$this->trans_id}'";    
        }
        if (isset($this->trans_ref) && $this->trans_ref!=="") {
            $sql.=",'{$this->trans_ref}'";    
        }
        if (isset($this->description) && $this->description!=="") {
            $sql.=",'{$this->description}'";    
        }
        if (isset($this->quantity) && $this->quantity!=="") {
            $sql.=",'{$this->quantity}'";    
        }
        if (isset($this->amount) && $this->amount!=="") {
            $sql.=",'{$this->amount}'";    
        }
        if (isset($this->total) && $this->total!=="") {
            $sql.=",'{$this->total}'";    
        }
        if (isset($this->trans_date) && $this->trans_date!=="") {
            $sql.=",'".str_replace(".000Z", "", str_replace("T", " ", $this->trans_date))."'";    
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
        $sql = "UPDATE purchases_ledger SET ";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= " id = '{$this->id}'";    
        }
        if (isset($this->trans_id) && $this->trans_id!=="" ) {
            $sql.= ", trans_id = '{$this->trans_id}'";    
        }
        if (isset($this->trans_ref) && $this->trans_ref!=="" ) {
            $sql.= ", trans_ref = '{$this->trans_ref}'";    
        }
        if (isset($this->description) && $this->description!=="" ) {
            $sql.= ", description = '{$this->description}'";    
        }
        if (isset($this->quantity) && $this->quantity!=="" ) {
            $sql.= ", quantity = '{$this->quantity}'";    
        }
        if (isset($this->amount) && $this->amount!=="" ) {
            $sql.= ", amount = '{$this->amount}'";    
        }
        if (isset($this->total) && $this->total!=="" ) {
            $sql.= ", total = '{$this->total}'";    
        }
        if (isset($this->trans_date) && $this->trans_date!=="" ) {
            $sql.= ", trans_date = '".str_replace(".000Z", "", str_replace("T", " ", $this->trans_date))."'";    
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
            $sql = "SELECT * from purchases_ledger order by id DESC";
        } else {
        $sql = "SELECT * from purchases_ledger WHERE $critcol ='{$critval}'";
        }
        $datasource = $db->getRowAssoc($sql);
        return $datasource;
    }

    public  function delete($critcol, $critval){
        $db = new DbHandlers();
        $sql = "DELETE FROM purchases_ledger WHERE $critcol ='{$critval}'";
        $d_out = $db->executeQuery($sql);
        return $d_out;
    }
}