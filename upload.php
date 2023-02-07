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

    <div class="contact_section layout_padding margin_top90">
        <div class="container">
            <h1 class="contact_taital">Upload File</h1>
            <p class="contact_text">Upload the financial excel file for viewing later on using a graph</p>
            <div class="contact_section_2 layout_padding">
                <div class="row">
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo "<h4 class=contact_text>" . $_SESSION['message'] . "</h4>";
                        unset($_SESSION['message']);
                    }
                    ?>
                    <div class="col-md-12">
                        <div class="contact_main">
                            <form method="POST" action="server/uploadCode.php" enctype="multipart/form-data">
                                <div>
                                    <input type="text" class="mail_text" name="first_name" id="first_name" placeholder="The First Name" required="true" data-validation-required-message="Please enter the first name">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <input type="text" class="mail_text" name="last_name" id="last_name" placeholder="The Last Name" required="true" data-validation-required-message="Please enter the last name">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <input type="date" class="mail_text" name="date_of_birth" id="date_of_birth" placeholder="The Date of Birth" required="true" data-validation-required-message="Please enter the date of birth">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label class="contact_text">Upload the Financials Excel File</label>
                                    <input type="file" class="mail_text" name="import_file" class="form-control">
                                </div>
                                <div class="form-group send_bt">
                                    <input type="submit"  name="submit" class="btn btn success" value="Upload"/>
                                </div>
                            </form>
                        </div>
                    </div>
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
</body>

</html>