<?php
    session_start();

    $con = mysqli_connect('localhost', 'root', '', 'epfdb');

    require '../vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    if(isset($_POST['submit']))
    {
        $first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$date_of_birth = $_POST['date_of_birth'];
        
        $filename = $_FILES['import_file']['name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

        $allowed_ext = ['xls','csv','xlsx'];

        if(in_array($file_ext, $allowed_ext))
        {
            $InputFileNamePath = $_FILES['import_file']['tmp_name'];
            $Spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($InputFileNamePath);
            $data = $Spreadsheet->getActiveSheet()->toArray();

            $count = "0";
            foreach($data as $row)
            {
                if($count > 0)
                {
                    $financial_month = $row['0'];
				    $income =$row['1'];
				    $expenses = $row['2'];

                    $insertQuery = "INSERT INTO financial(first_name, last_name, date_of_birth, financial_month, income, expenses) 
                                    VALUES('$first_name','$last_name','$date_of_birth','$financial_month','$income','$expenses')";
                
                    $result = mysqli_query($con,$insertQuery);

                    $msg = true;
                }
                else
                {
                    $count = "1";
                }                
            }

            if(isset($msg))
            {
                $_SESSION['message'] = "Successfully Imported";
                header('location: ../upload.php');
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "Not Imported";
                header('location: ../upload.php');
                exit(0);
            }
        }
        else
        {
            $_SESSION['message'] = "Invalid file";
            header('location: ../upload.php');
            exit(0);
        }
    }
?>