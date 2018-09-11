<?php
/**
This php script implements 

PHP Version 5+
@Author: Abayomi Apetu
*/


require "DbHandlers.php";

class Account_gl{

    /** 
Object(class) properties.
     Object(class) public properties.
*/ 
    public $id;
    public $naration;
    public $trans_id;
    public $trans_ref;
    public $debit;
    public $credit;
    public $trans_date;
    public $value_date;
    public $savedby;
    public $postby;
    public $date_created;
    public $date_updated;
    public $date_deleted;
    public $status;



    public function _construct(){
        /** Todo, add code for system initialization here!*/ 
    }

    public function save(){
        $db = new DbHandlers();
        $sql = "INSERT INTO account_gl(";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= 'id';    
        }
        if (isset($this->naration) && $this->naration!=="" ) {
            $sql.= ',naration';    
        }
        if (isset($this->trans_id) && $this->trans_id!=="" ) {
            $sql.= ',trans_id';    
        }
        if (isset($this->trans_ref) && $this->trans_ref!=="" ) {
            $sql.= ',trans_ref';    
        }
        if (isset($this->debit) && $this->debit!=="" ) {
            $sql.= ',debit';    
        }
        if (isset($this->credit) && $this->credit!=="" ) {
            $sql.= ',credit';    
        }
        if (isset($this->trans_date) && $this->trans_date!=="" ) {
            $sql.= ',trans_date';    
        }
        if (isset($this->value_date) && $this->value_date!=="" ) {
            $sql.= ',value_date';    
        }
        if (isset($this->savedby) && $this->savedby!=="" ) {
            $sql.= ',savedby';    
        }
        if (isset($this->postby) && $this->postby!=="" ) {
            $sql.= ',postby';    
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
        if (isset($this->naration) && $this->naration!=="") {
            $sql.=",'{$this->naration}'";    
        }
        if (isset($this->trans_id) && $this->trans_id!=="") {
            $sql.=",'{$this->trans_id}'";    
        }
        if (isset($this->trans_ref) && $this->trans_ref!=="") {
            $sql.=",'{$this->trans_ref}'";    
        }
        if (isset($this->debit) && $this->debit!=="") {
            $sql.=",'{$this->debit}'";    
        }
        if (isset($this->credit) && $this->credit!=="") {
            $sql.=",'{$this->credit}'";    
        }
        if (isset($this->trans_date) && $this->trans_date!=="") {
            $sql.=",'".str_replace(".000Z", "", str_replace("T", " ", $this->trans_date))."'";    
        }
        if (isset($this->value_date) && $this->value_date!=="") {
            $sql.=",'".str_replace(".000Z", "", str_replace("T", " ", $this->value_date))."'";    
        }
        if (isset($this->savedby) && $this->savedby!=="") {
            $sql.=",'{$this->savedby}'";    
        }
        if (isset($this->postby) && $this->postby!=="") {
            $sql.=",'{$this->postby}'";    
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
        $sql = "UPDATE account_gl SET ";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= " id = '{$this->id}'";    
        }
        if (isset($this->naration) && $this->naration!=="" ) {
            $sql.= ", naration = '{$this->naration}'";    
        }
        if (isset($this->trans_id) && $this->trans_id!=="" ) {
            $sql.= ", trans_id = '{$this->trans_id}'";    
        }
        if (isset($this->trans_ref) && $this->trans_ref!=="" ) {
            $sql.= ", trans_ref = '{$this->trans_ref}'";    
        }
        if (isset($this->debit) && $this->debit!=="" ) {
            $sql.= ", debit = '{$this->debit}'";    
        }
        if (isset($this->credit) && $this->credit!=="" ) {
            $sql.= ", credit = '{$this->credit}'";    
        }
        if (isset($this->trans_date) && $this->trans_date!=="" ) {
            $sql.= ", trans_date = '".str_replace(".000Z", "", str_replace("T", " ", $this->trans_date))."'";    
        }
        if (isset($this->value_date) && $this->value_date!=="" ) {
            $sql.= ", value_date = '".str_replace(".000Z", "", str_replace("T", " ", $this->value_date))."'";    
        }
        if (isset($this->savedby) && $this->savedby!=="" ) {
            $sql.= ", savedby = '{$this->savedby}'";    
        }
        if (isset($this->postby) && $this->postby!=="" ) {
            $sql.= ", postby = '{$this->postby}'";    
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
            $sql = "SELECT * from account_gl order by id DESC";
        } else {
        $sql = "SELECT * from account_gl WHERE $critcol ='{$critval}'";
        }
        $datasource = $db->getRowAssoc($sql);
        return $datasource;
    }

    public  function delete($critcol, $critval){
        $db = new DbHandlers();
        $sql = "DELETE FROM account_gl WHERE $critcol ='{$critval}'";
        $d_out = $db->executeQuery($sql);
        return $d_out;
    }
}