<?php

if(!$_SESSION['login']){
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Event Management</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Popup Modal -->
        <link href="../css/popModal.css" type="text/css" rel="stylesheet" >
        <!-- Preview -->
        <link href="../css/preview.css" type="text/css" rel="stylesheet" >
         <!-- iCheck for checkboxes and radio inputs -->
        <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />
         <!-- daterange picker -->
        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap time Picker -->
        <link href="../css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery 2.0.2 -->
        <script src="../js/jquery.js"></script>
        <script src="../js/function.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
       	<!-- date-range-picker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="../js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="../js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="../js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- pop Modal-->
        <script src="../js/popup/popModal.js"></script>
        <!-- bootstrap time picker -->
        <script src="../js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
		 <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
       

    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Event Management
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <?php
                        if(isset($_SESSION['user_type_id']) && $_SESSION['user_type_id'] == 4){
                        ?>
                          <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="training_dashboard.php?page=view_not_approved" class="dropdown-toggle" >
                               <strong>Approval</strong>
                                <?php
                                $query_approved = mysql_query("select count(transaction_id) as jumlah from transactions where transaction_approved_status = '0' and transaction_type_date = '1'");
                                $row_approved = mysql_fetch_array($query_approved);
                                if($row_approved['jumlah'] > 0){
								?>
                                
                                <span class="label label-warning"><?= $row_approved['jumlah'] ?></span>
                                <?php
								}
								?>
                            </a>
                                
                        </li>
                        <?php
                        }else if(isset($_SESSION['user_type_id']) && $_SESSION['user_type_id'] == 1){ ?>
                        <li class="dropdown notifications-menu">
                            <a href="travel_transaction.php?page=list_approved" class="dropdown-toggle" >
                               <strong>Travel </strong>
                                <?php
                                $query_travel = mysql_query("select count(travel_transaction_id) as jumlah from travel_transactions where travel_status = '1'");
                                $row_travel = mysql_fetch_array($query_travel);
								 if($row_travel['jumlah'] > 0){
                                ?>
                                <span class="label label-warning"><?= $row_travel['jumlah'] ?></span>
                                <?php
								 }
								?>
                            </a>
                                
                        </li>
                         <li class="dropdown notifications-menu">
                            <a href="logistic.php?page=list_approved" class="dropdown-toggle" >
                               <strong>Logistic </strong>
                                <?php
                                $query_logistic = mysql_query("select count(logistic_id) as jumlah from logistics where logistic_status = '1'");
                                $row_logistic = mysql_fetch_array($query_logistic);
								if($row_logistic['jumlah'] > 0){
                                ?>
                                <span class="label label-warning"><?= $row_logistic['jumlah'] ?></span>
                                <?php
								}
								?>
                            </a>
                                
                        </li>
						<?php
						}
                        ?>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>
                                    <?php
                                        $user_data = get_user_data();
                                        echo $user_data[0];
                                    ?>
                                     <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-new-red">
                                <?php
                            
							if($user_data[2]==""){
								$img = "../img/user/default.jpg";
							}else{
								$img = "../img/user/".$user_data[2];
							}
							?>
                                    <img src="<?= $img ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php
                                        
                                        echo $user_data[0];
                                        ?>
                                        <small><?php
                                        
                                        echo $user_data[1];
                                        ?></small>
                                    </p>
                                </li>
                              
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="edit_admin.php?page=form" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php
                include("../views/layout/left_side.php");
            ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
        




