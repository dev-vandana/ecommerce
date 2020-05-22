<?php

class Helper extends DB
{    
    public function __construct() {
        parent::__construct();
    }

    public function check_empty($data, $fields)
    {
        $msg = null;
        foreach ($fields as $value) {
            if( $value == 'attachhment_path' ){
                $msg .= $this->checkFileEmpty();
            }elseif (empty($data[$value])) {
                $value = str_replace('_', ' ', $value);
                $msg .= '"'.$value.'"field empty <br />';
            }

        } 
        return $msg;
    }

    public function checkFileEmpty()
    {
        $msg = '';
        if( empty($_FILES) || $_FILES['attachhment_path']['size'] == 0 ){
            $msg .= '"attachhment_path"field empty <br />';
        }
        $msg .= $this->fileCheck();
        return $msg;
    }

    public function fileCheck()
    {
        $msg = '';

        if( !empty($_FILES['attachhment_path']['tmp_name']) )
        {
            $file_parts = pathinfo($_FILES['attachhment_path']['name']);

            $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc','pdf');

            if (!in_array($file_parts['extension'], $allowedfileExtensions)) {
                $msg = '"attachhment_path" file should only include '.implode(',',$allowedfileExtensions).' <br />';
            }

        }

        return $msg;
    }


    public function uploadFile()
    {
        $uploadFileDir = '../upload_file/';
        $fileTmpPath = $_FILES['attachhment_path']['tmp_name'];
        $fileName = $_FILES['attachhment_path']['name'];
        $file_parts = pathinfo($_FILES['attachhment_path']['name']);
        $newFileName = md5(time() . $fileName) . '.' . $file_parts['extension'];
        $dest_path = $uploadFileDir . $newFileName;
        $response = [];

        //echo $dest_path;exit;
        if(move_uploaded_file($fileTmpPath, $dest_path))
        {
            $response['status'] = 1;
            $response['file_path'] = $newFileName;
        }else
        {
            $response['status'] = 0;
        }
        return $response;
    }

    function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    function getFormattedDate( $date , $format = 'Y-m-d H:i:s' )
    {
        $time = date($format,strtotime($date));
        return $time;
    }
}

?>