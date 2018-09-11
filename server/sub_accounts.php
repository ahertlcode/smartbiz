<?php
/**
This php script implements 

PHP Version 5+
@Author: Abayomi Apetu
*/


require "DbHandlers.php";

class Sub_account{

    /** 
Object(class) properties.
     Object(class) public properties.
*/ 
    public $id;
    public $master_id;
    public $account_id;
    public $account_name;
    public $showTB;
    public $showPNL;
    public $showCF;
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
        $sql = "INSERT INTO sub_accounts(";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= 'id';    
        }
        if (isset($this->master_id) && $this->master_id!=="" ) {
            $sql.= ',master_id';    
        }
        if (isset($this->account_id) && $this->account_id!=="" ) {
            $sql.= ',account_id';    
        }
        if (isset($this->account_name) && $this->account_name!=="" ) {
            $sql.= ',account_name';    
        }
        if (isset($this->showTB) && $this->showTB!=="" ) {
            $sql.= ',showTB';    
        }
        if (isset($this->showPNL) && $this->showPNL!=="" ) {
            $sql.= ',showPNL';    
        }
        if (isset($this->showCF) && $this->showCF!=="" ) {
            $sql.= ',showCF';    
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
        if (isset($this->master_id) && $this->master_id!=="") {
            $sql.=",'{$this->master_id}'";    
        }
        if (isset($this->account_id) && $this->account_id!=="") {
            $sql.=",'{$this->account_id}'";    
        }
        if (isset($this->account_name) && $this->account_name!=="") {
            $sql.=",'{$this->account_name}'";    
        }
        if (isset($this->showTB) && $this->showTB!=="") {
            $sql.=",'{$this->showTB}'";    
        }
        if (isset($this->showPNL) && $this->showPNL!=="") {
            $sql.=",'{$this->showPNL}'";    
        }
        if (isset($this->showCF) && $this->showCF!=="") {
            $sql.=",'{$this->showCF}'";    
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
        $sql = "UPDATE sub_accounts SET ";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= " id = '{$this->id}'";    
        }
        if (isset($this->master_id) && $this->master_id!=="" ) {
            $sql.= ", master_id = '{$this->master_id}'";    
        }
        if (isset($this->account_id) && $this->account_id!=="" ) {
            $sql.= ", account_id = '{$this->account_id}'";    
        }
        if (isset($this->account_name) && $this->account_name!=="" ) {
            $sql.= ", account_name = '{$this->account_name}'";    
        }
        if (isset($this->showTB) && $this->showTB!=="" ) {
            $sql.= ", showTB = '{$this->showTB}'";    
        }
        if (isset($this->showPNL) && $this->showPNL!=="" ) {
            $sql.= ", showPNL = '{$this->showPNL}'";    
        }
        if (isset($this->showCF) && $this->showCF!=="" ) {
            $sql.= ", showCF = '{$this->showCF}'";    
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
            $sql = "SELECT * from sub_accounts order by id DESC";
        } else {
        $sql = "SELECT * from sub_accounts WHERE $critcol ='{$critval}'";
        }
        $datasource = $db->getRowAssoc($sql);
        return $datasource;
    }

    public  function delete($critcol, $critval){
        $db = new DbHandlers();
        $sql = "DELETE FROM sub_accounts WHERE $critcol ='{$critval}'";
        $d_out = $db->executeQuery($sql);
        return $d_out;
    }
}