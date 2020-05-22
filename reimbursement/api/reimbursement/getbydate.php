<?php

require_once '../DB.php';
require_once '../Helper.php';
  
Class Getbydate extends DB
{
    private $helper;

    public function __construct() {
        parent::__construct();
        $this->helper = new Helper();
    }

    public function getDataByDate()
    {
        if( empty($_GET) || !isset($_GET['date']) || empty($_GET['date']) ){
            echo json_encode('"Date" field is required');
            exit;
        }
        
        $startDate = $this->helper->getFormattedDate($_GET['date'].' 00:00:00','Y-m-d H:i:s');
        $endDate = $this->helper->getFormattedDate($_GET['date'].' 23:59:59','Y-m-d H:i:s');

        $sql = "SELECT * FROM reimbursement WHERE `from` BETWEEN '". $startDate ."' AND '". $endDate."'";  
        
        $result = $this->connection->query($sql);

        $response = [];
        $fileUrl = 'ecommerce/reimbursement/upload_file/';
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $row['attachhment_path'] = $fileUrl.$row['attachhment_path'];
                $response[] = $row;
            }
        } else {
            $response = ['No result found'];
        }
        echo json_encode($response,JSON_UNESCAPED_SLASHES);
        exit;
    }
}

$create = new Getbydate();
$create->getDataByDate();
?>