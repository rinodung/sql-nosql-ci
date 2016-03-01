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

    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}
?>