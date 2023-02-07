<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="uif-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>EPF Assignment | Uploading Excel</title>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

    <?php include('template/header.php') ?>

    <?Php
        require "server/config-pdo.php"; // Database connection


            //$first_name = $_POST['first_name'];
            //$last_name = $_POST['last_name'];
            //$date_of_birth = $_POST['date_of_birth'];

            $query = "SELECT financial_month,income,expenses
                      FROM financial";
//                      WHERE first_name = '$first_name' AND last_name = '$last_name' AND date_of_birth = '$date_of_birth'";

            $step = $dbo->prepare($query);

            if ($step->execute()) {
                $php_data_array = $step->fetchAll();
                //print_r($php_data_array);
                echo "<script>
                            var my_2d= " . json_encode($php_data_array) . "
                        </script>";
            }
            else {
                $_SESSION['message'] = "No record found, Please upload the financial files before viewing";
                header('location: view.php');
                exit(0);
            }
    ?>

    <div class="contact_section layout_padding margin_top90">
        <div class="container">
            <h1 class="contact_taital">Financials</h1>
            <p class="contact_text">View the financial information uploaded using a graph</p>
            <div class="contact_section_2 layout_padding">
                <div class="row">
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo "<h4 class=contact_text>" . $_SESSION['message'] . "</h4>";
                        unset($_SESSION['message']);
                    }
                    ?>
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="col-md-12" id='curve_chart' style="width: 100%; height: 100%;"></div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>

    <?php include('template/footer.php') ?>

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <!-- graph -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart']
        })
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            //var data=new google.visualization
            var data = new google.visualization.DataTable();

            data.addColumn('string', 'Month');
            data.addColumn('number', 'Income');
            data.addColumn('number', 'Expenses');

            for (i = 0; i < my_2d.length; i++)
                data.addRow([my_2d[i][0], parseInt(my_2d[i][1]), parseInt(my_2d[i][2])]);

            var options = {
                title: 'Income VS Expenses',
                curveType: 'function',
                width: 800,
                height: 500,
                legend: {
                    position: 'bottom'
                },
                animation: {
                    'startup': true,
                    duration: 5000,
                    easing: 'out',
                },
            };

            var chart = new
            google.visualization.LineChart(document.getElementById('curve_chart'))
            chart.draw(data, options);
        }
    </script>

</html>