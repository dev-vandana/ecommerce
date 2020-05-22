<?php
// required headers
header("Access-Control-Allow-Origin: *");

  
// get database connection
require_once '../DB.php';
require_once '../Helper.php';
  
Class Create extends DB
{
    private $helper;

    private $tableFields = ['type', 'select_year','select_month', 'from', 'to', 'purpose', 'other_pupose', 'mode', 'other_mode', 'km', 'inv_no', 'amt', 'attachhment_path'];

    public function __construct() {
        parent::__construct();
        $this->helper = new Helper();
    }

    public function create()
    {
        if( isset($_POST['type']) && !empty($_POST['type']) ){
            $requiredField = [];
            switch( $_POST['type'] )
            {
                case 'conveyance' :
                    $requiredField = ['select_year','select_month','from','to','purpose','mode','amt'];
                    if( $_POST['purpose'] == 'other'  ){
                        $requiredField[] = 'other_pupose';
                    }
                    if( $_POST['mode'] == 'other'  ){
                        $requiredField[] = 'other_mode';
                    }

                    break;

                case 'hotel' :
                    $requiredField = ['select_year','select_month','from','to','inv_no','attachhment_path','amt'];
                    break;
                
                case 'food' :
                     $requiredField = ['select_year','select_month','inv_no','attachhment_path','amt'];
                    break;

                case 'mobile' :
                    $requiredField = ['select_year','select_month','inv_no','attachhment_path','amt'];
                    break;

                case 'internet' :
                    $requiredField = ['select_year','select_month','inv_no','attachhment_path','amt'];
                    break;

                case 'other' :
                    $requiredField = ['select_year','select_month'];
                    break;
            }

            if( !empty($requiredField) ){
                $error = $this->helper->check_empty($_POST,$requiredField);

                // To check file extension for not required fields.
                if( !in_array('attachhment_path', $requiredField) && !empty($_FILES) ){
                    $error .= $this->helper->fileCheck();
                }

                if( !empty($error) ){
                    echo $error;
                    exit;
                }

                $this->addData( $_POST );

            }

        }else{
            echo '"type" field empty.';
        }
        exit;
    }

    public function addData( $data )
    {
        $data['from'] = $this->helper->getFormattedDate($data['from']);
        $data['to'] = $this->helper->getFormattedDate($data['to']);


        foreach ($this->tableFields as $field) {
            if( !isset($data[$field]) ){
                $data[$field] = '';
            }
        }

        if( !empty($_FILES) && !empty($_FILES['attachhment_path']['name']) ){
            $uploadFile = $this->helper->uploadFile();
            if( $uploadFile['status'] ){
                $data['attachhment_path'] = $uploadFile['file_path'];
            }else{
                echo 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
                exit;
            }            
        }
        $query = "INSERT INTO `reimbursement`(`type`, `select_month`, `select_year`, `from`, `to`, `purpose`, `other_pupose`, `mode`, `other_mode`, `km`, `inv_no`, `amt`, `attachhment_path`) VALUES ('".$data['type']."','".$data['select_month']."','".$data['select_year']."','".$data['from']."','".$data['to']."','".$data['purpose']."','".$data['other_pupose']."','".$data['mode']."','".$data['other_mode']."','".$data['km']."','".$data['inv_no']."','".$data['amt']."','".$data['attachhment_path']."')";
       
        $result = $this->connection->query($query);
        $response = [];
        if ($result == true) {
            $last_id = $this->connection->insert_id;
            $response = ['msg' => 'Data added successfully. ','id'=>$last_id]; 
        } else {
            $response = ['msg' => 'Data is not inserted. Try again later']; 
        }
        echo json_encode($response);
        exit;
    }
}

$create = new Create();
$create->create();
?>