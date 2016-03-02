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
        
        //SQL        
        $this->benchmark->mark('code_start');
        $query = $this->db->get($table, $num);
        $sqlData = $query->result();
        $this->benchmark->mark('code_end');
        $sqlTime = $this->benchmark->elapsed_time('code_start', 'code_end');            

        //NOSQL
        $this->benchmark->mark('code_start');
        $noSqlData = $this->mongo_db->limit($num)->get($table);
        $this->benchmark->mark('code_end');
        $noSqlTime = $this->benchmark->elapsed_time('code_start', 'code_end');     

        $result = array("sql" => array("time" => $sqlTime,
                                        "data" => $sqlData),
                        "nosql" => array("time" => $noSqlTime,
                                        "data" => $noSqlData)
                        );
                         
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

        //SQL        
        $this->benchmark->mark('code_start');
        $this->db->insert_batch($table, $insertData);        
        $this->benchmark->mark('code_end');
        $sqlTime = $this->benchmark->elapsed_time('code_start', 'code_end');            

        //NOSQL
        $this->benchmark->mark('code_start');
        $noSqlData = $this->mongo_db->batch_insert($table, $insertData);
        $this->benchmark->mark('code_end');
        $noSqlTime = $this->benchmark->elapsed_time('code_start', 'code_end');     

        $result = array("sql" => array("time" => $sqlTime,
                                        "data" => $insertData),
                        "nosql" => array("time" => $noSqlTime,
                                        "data" => $insertData)
                        );

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

        $query = $this->db->get($table, $num);

        $updateData = array();
        $noSqlDataUpdate = array();
        $noSqlTime =0;
        $sqlTime = 0;
        $this->benchmark->mark('code_start');

        foreach ($query->result() as $row) {
            $updateData[$row->id] = array('name' => 'Updated Name ' . rand(),
                'address' => 'Update address ' . rand()); 
           $this->db->update($table, $updateData[$row->id], array('id' => $row->id)); 
        }        
        $this->benchmark->mark('code_end');

        $sqlTime = $this->benchmark->elapsed_time('code_start', 'code_end');      

        //NOSQL
        
        $noSqlData = $this->mongo_db->limit($num)->get($table);
        
        $this->benchmark->mark('code_start');
        $i =0;
        foreach ($noSqlData as $row) {
            $noSqlDataUpdate[$i] = array('_id' => $row["_id"],
                'name' => 'Updated Name ' . rand(),
                'address' => 'Update address ' . rand()); 
            $this->mongo_db->where(array("_id", $row["_id"]));
            
            $this->mongo_db->update($table, $noSqlDataUpdate[$i]); 
            $i++;
        }
        $this->benchmark->mark('code_end');

        $noSqlTime = $this->benchmark->elapsed_time('code_start', 'code_end');
        
        $result = array("sql" => array("time" => $sqlTime,
                                        "data" => $updateData),
                        "nosql" => array("time" => $noSqlTime,
                                        "data" => $noSqlDataUpdate)
                        );
        
        return $result;
    }

    /*
    Select function
    */
    function delete($table = "users", $num =100)
    {
        /*if(isset($_POST["record"])) {
            $num = $_POST["record"];
        }

        $deleteData = array();
        $this->benchmark->mark('code_start');
        $this->db->query('DELETE FROM ' . $table. ' ORDER BY id ASC limit '. $num);
        $this->benchmark->mark('code_end');
        $eTime = $this->benchmark->elapsed_time('code_start', 'code_end');
        $result = array("time" => $eTime,                    
                    "data" => $deleteData);
        return $result;*/


        if(isset($_POST["record"])) {
            $num = $_POST["record"];
        }

        $query = $this->db->get($table, $num);

        $deleteData = array();
        $noSqlDatadelete = array();
        $noSqlTime =0;
        $sqlTime = 0;
        $this->benchmark->mark('code_start');

        foreach ($query->result() as $row) {
            $deleteData[$row->id] = array('name' => $row->name,
                'address' => $row->address); 
           $this->db->delete($table, array('id' => $row->id)); 
        }        
        $this->benchmark->mark('code_end');

        $sqlTime = $this->benchmark->elapsed_time('code_start', 'code_end');      

        //NOSQL
        
        $noSqlData = $this->mongo_db->limit($num)->get($table);
        
        $this->benchmark->mark('code_start');
        $i =0;
        foreach ($noSqlData as $row) {
            $noSqlDatadelete[$i] = array('_id' => $row["_id"],
                'name' => 'deleted Name ' . rand(),
                'address' => 'delete address ' . rand()); 
            $this->mongo_db->where(array("_id", $row["_id"]));
            
            $this->mongo_db->delete($table); 
            $i++;
        }
        $this->benchmark->mark('code_end');

        $noSqlTime = $this->benchmark->elapsed_time('code_start', 'code_end');
        
        $result = array("sql" => array("time" => $sqlTime,
                                        "data" => $deleteData),
                        "nosql" => array("time" => $noSqlTime,
                                        "data" => $noSqlDatadelete)
                        );
        
        return $result;
    }
    

}
?>