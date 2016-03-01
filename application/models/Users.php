<?php
class Users extends CI_Model {

    var $id   = '';
    var $name = '';
    var $address    = '';

    function __construct()
    {
        // Call the Model constructor

        parent::__construct();
    }

    /*
    Select function
    */
    function select($table = "users", $num =100)
    {
        if(isset($_POST["record"])) {
            $num = $_POST["record"];
        }
        $this->benchmark->mark('code_start');
        $query = $this->db->get($table, $num);
        $this->benchmark->mark('code_end');
        $eTime = $this->benchmark->elapsed_time('code_start', 'code_end');
        $result = array("time" => $eTime,
                    "data" => $query->result());
        return $result;
    }
    /*
    Select function
    */
    function insert($table = "users", $num =100)
    {
        if(isset($_POST["record"])) {
            $num = $_POST["record"];
        }
        $insertData = array();
        for($i =0 ; $i < $num ; $i++) {
            $insertData[] = array('name' => 'Inserted Name ' . rand(),
                'address' => 'Insert address ' . rand());  
        }
        $this->benchmark->mark('code_start');
        $this->db->insert_batch($table, $insertData);
        $this->benchmark->mark('code_end');
        $eTime = $this->benchmark->elapsed_time('code_start', 'code_end');
        $result = array("time" => $eTime,
                    "data" => $insertData);
        return $result;
    }

    /*
    Select function
    */
    function update($table = "users", $num =100)
    {
        if(isset($_POST["record"])) {
            $num = $_POST["record"];
        }
        $updateData = array();
        $this->benchmark->mark('code_start');
        for($i =0 ; $i < $num ; $i++) {
            $updateData[$i] = array('id' => $i+1,
                'name' => 'Updated Name ' . rand(),
                'address' => 'Update address ' . rand()); 
            $this->db->update($table, $updateData[$i], array('id' => $i+1)); 
        }       
        
        $this->benchmark->mark('code_end');
        $eTime = $this->benchmark->elapsed_time('code_start', 'code_end');
        $result = array("time" => $eTime,                    
                    "data" => $updateData);
        return $result;
    }

    /*
    Select function
    */
    function delete($table = "users", $num =100)
    {
        if(isset($_POST["record"])) {
            $num = $_POST["record"];
        }

        $deleteData = array();
        $this->benchmark->mark('code_start');
        $this->db->query('DELETE FROM ' . $table. ' ORDER BY id ASC limit '. $num);
        $this->benchmark->mark('code_end');
        $eTime = $this->benchmark->elapsed_time('code_start', 'code_end');
        $result = array("time" => $eTime,                    
                    "data" => $deleteData);
        return $result;
    }
    

}
?>