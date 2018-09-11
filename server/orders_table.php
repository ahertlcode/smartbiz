<?php
/**
This php script implements 

PHP Version 5+
@Author: Abayomi Apetu
*/


require "DbHandlers.php";

class Orders_table{

    /** 
Object(class) properties.
     Object(class) public properties.
*/ 
    public $id;
    public $customers_id;
    public $order_item;
    public $order_date;
    public $fulfilby;
    public $quantity;
    public $amount;
    public $total;
    public $date_created;
    public $date_updated;
    public $date_deleted;
    public $status;



    public function _construct(){
        /** Todo, add code for system initialization here!*/ 
    }

    public function save(){
        $db = new DbHandlers();
        $sql = "INSERT INTO orders_table(";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= 'id';    
        }
        if (isset($this->customers_id) && $this->customers_id!=="" ) {
            $sql.= ',customers_id';    
        }
        if (isset($this->order_item) && $this->order_item!=="" ) {
            $sql.= ',order_item';    
        }
        if (isset($this->order_date) && $this->order_date!=="" ) {
            $sql.= ',order_date';    
        }
        if (isset($this->fulfilby) && $this->fulfilby!=="" ) {
            $sql.= ',fulfilby';    
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
        if (isset($this->customers_id) && $this->customers_id!=="") {
            $sql.=",'{$this->customers_id}'";    
        }
        if (isset($this->order_item) && $this->order_item!=="") {
            $sql.=",'{$this->order_item}'";    
        }
        if (isset($this->order_date) && $this->order_date!=="") {
            $sql.=",'".str_replace(".000Z", "", str_replace("T", " ", $this->order_date))."'";    
        }
        if (isset($this->fulfilby) && $this->fulfilby!=="") {
            $sql.=",'{$this->fulfilby}'";    
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
        $sql = "UPDATE orders_table SET ";
        if (isset($this->id) && $this->id!=="" ) {
             $sql.= " id = '{$this->id}'";    
        }
        if (isset($this->customers_id) && $this->customers_id!=="" ) {
            $sql.= ", customers_id = '{$this->customers_id}'";    
        }
        if (isset($this->order_item) && $this->order_item!=="" ) {
            $sql.= ", order_item = '{$this->order_item}'";    
        }
        if (isset($this->order_date) && $this->order_date!=="" ) {
            $sql.= ", order_date = '".str_replace(".000Z", "", str_replace("T", " ", $this->order_date))."'";    
        }
        if (isset($this->fulfilby) && $this->fulfilby!=="" ) {
            $sql.= ", fulfilby = '{$this->fulfilby}'";    
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
            $sql = "SELECT * from orders_table order by id DESC";
        } else {
        $sql = "SELECT * from orders_table WHERE $critcol ='{$critval}'";
        }
        $datasource = $db->getRowAssoc($sql);
        return $datasource;
    }

    public  function delete($critcol, $critval){
        $db = new DbHandlers();
        $sql = "DELETE FROM orders_table WHERE $critcol ='{$critval}'";
        $d_out = $db->executeQuery($sql);
        return $d_out;
    }
}