<?php
    session_start();

    require 'config-pdo.php'; // Database connection

    if(isset($_POST['submit'])){

        $first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$date_of_birth = $_POST['date_of_birth'];

        $query="SELECT financial_month,income,expenses 
            FROM financial 
            WHERE first_name = '$first_name' AND last_name = '$last_name' AND date_of_birth = '$date_of_birth'";

        $step = $dbo->prepare($query);

        if($step->execute()){
            $php_data_array = $step->fetchAll(); //
            header('location: ../view.php');
            exit(0);
        }

    }    
?>