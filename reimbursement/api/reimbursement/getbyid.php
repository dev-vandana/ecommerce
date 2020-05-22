<?php

require_once '../DB.php';
require_once '../Helper.php';
  
Class Getbyid extends DB
{
    private $helper;

    public function __construct() {
        parent::__construct();
        $this->helper = new Helper();
    }

    public function getDataById()
    {
        if( empty($_GET) || !isset($_GET['id']) || empty($_GET['id']) ){
            echo json_encode('"ID" field is required');
            exit;
        }  

        $sql = "SELECT * FROM reimbursement WHERE id=".$_GET['id'];  
        $result = $this->connection->query($sql);

        $response = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $response[] = $row;
            }
        } else {
            $response = ['No result found'];
        }
        echo json_encode($response);
        exit;
    }
}

$create = new Getbyid();
$create->getDataById();
?>