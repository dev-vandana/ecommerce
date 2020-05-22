<?php

require_once 'DB.php';
require_once 'SimpleXLSX.php';


Class Importer extends DB
{

	public function __construct() {
		parent::__construct();
	}
	
	public function execute()
	{
		if( !empty($_FILES) && isset($_FILES['import_file']) ){

			$file = $_FILES['import_file'];
			
			$filename = $file['tmp_name'];

			$file_parts = pathinfo($file['name']);

			if( $file_parts['extension'] != 'xlsx' ){
				echo "Only xlsx file is supported";
				exit;
			}
			
			$response = $this->readXlsx($filename);
			echo "<pre>";
			print_r($response);
		}else{
			echo 'File is not selected';
			header( "refresh:5;url=ecommerce/employee/index.php" );
			exit();

		}

		
	}

	public function readXlsx( $filename )
	{
		$response = [];
		$response['error'] = [];
		if ( $xlsx = SimpleXLSX::parse($filename)) {
			// Produce array keys from the array values of 1st array element
			$header_values = $rows = [];

			$response = [];
			
			$requiredFields = ['date','employee_id','working_type','start','end','store_id'];
			$counter = 2;
			$totalRecords = 0;

			foreach ( $xlsx->rows() as $k => $r ) {

				$r = array_map('trim',$r);
				if ( $k === 0 ) {
					$header_values = str_replace(' ', '_', $r);
					continue;
				}

				$data = array_combine( $header_values, $r );

				$data['date'] = date("Y-m-d", strtotime($data['date']));

				if(  !in_array($data['working_type'],['day off','leave']) ){
					$msg = $this->check_empty($data,$requiredFields);

					if( !empty($msg) ){
						$response['error'][$counter] = 'Row no '.$counter.'--->'.$msg;
					}else{
						$this->addData($data);
						$totalRecords++;
					}
				}else{
					$this->addData($data);
					$totalRecords++;
				}	

				$counter++;
			}
		}else{
			$response['error'] = 'Cannot Parse file';
		}
		$response['total_records_inserted'] = $totalRecords;
		return $response;
	}

	public function check_empty($data, $fields)
    {
        $msg = null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
            	$value = str_replace('_', ' ', $value);
                $msg .= '"'.$value.'"field empty <br />';
            }
        } 
        return $msg;
    }

    public function addData( $data )
    {
    	$query = "INSERT INTO `employee`(`employee_id`, `name`, `working_type`, `start_time`, `end_time`, `store_id`, `store_name`, `date`) VALUES ('".$data['employee_id']."','".$data['name']."','".$data['working_type']."','".$data['start']."','".$data['end']."','".$data['store_id']."','".$data['store_name']."','".$data['date']."')";
       
        $result = $this->connection->query($query);
    
        if ($result == false) {
            return false;
        } else {
            return true;
        }
    }
}

$importer = new Importer();
$importer->execute();