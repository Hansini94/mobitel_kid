<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>.: CMS - MOBITEL E-COMMERCE PORTAL :.</title>
        <?php $userbackendsession = $this->session->userdata('userbackendsession');
        if ($userbackendsession == '') {
            $data = array();
            $data['error'] = '';
            $this->load->view('adminpanel/login_form', $data);
			exit();
        } ?>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/fonts/css/font-awesome.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/animate.min.css"); ?>" rel="stylesheet">
        <!-- Custom styling plus plugins -->
        <!--favicon-->
       <link href="https://www.mobitel.lk/sites/all/themes/mobitel/templates/new-home/images/favicon.png" href="" rel="icon">
        <!--favicon-->
        <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/icheck/flat/green.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/datatables/tools/css/dataTables.tableTools.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/calendar/fullcalendar.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/calendar/fullcalendar.print.css"); ?>" rel="stylesheet" media="print">


        <!-- colorpicker -->
        <link href="<?php echo base_url("assets/css/colorpicker/bootstrap-colorpicker.min.css"); ?>" rel="stylesheet">
        <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/moment.min2.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/datepicker/daterangepicker.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/clockpicker/clockpicker.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/moment.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/calendar/fullcalendar.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/validator/validator.js"); ?>"></script>




        <?php /* ?><link href="<?php echo base_url("assets/timepicker/css/bootstrap-datetimepicker.min.css"); ?>" rel="stylesheet">
          <script src="<?php echo base_url("assets/timepicker/js/bootstrap-datetimepicker.min.js"); ?>"></script><?php */ ?>


        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
            
            <style>
                /*.btn-dark {background-image: linear-gradient(to right, #00c183 0%, #006185  51%, #00c183  100%)}*/
                .btn-dark {
                    background-color: #3b5392;
                        font-size: 12px;
                        padding: 15px 25px;
                        text-align: center;
                        text-transform: uppercase;
                        transition: 0.5s;
                        background-size: 200% auto;
                        color: white;            
                        border-radius: 5px;
                        /*display: block;*/
                }
                
                .btn-dark:hover {
                    background-color: #91c83f;
                        background-position: right center; /* change the direction of the change here */
                        color: #ffffff !important;
                        text-decoration: none;
                }
                
                /*.btn-primary {background-image: linear-gradient(to right, #c8cfe9 0%, #b8e0d2  51%, #c4df9b  100%)}*/
                    .btn-primary {
                        background-color: #2D7DC4;
                        font-size: 12px;
                        font-weight: 900;
                        padding: 15px 25px;
                        text-align: center;
                        text-transform: uppercase;
                        transition: 0.5s;
                        background-size: 200% auto;
                        border-radius: 5px;
                        color: #ffffff;
                        /*display: block;*/
                    }
                    
                    .btn-primary:hover {
                        background-color: #0056a2;
                        background-position: right center; /* change the direction of the change here */
                        color: #ffffff !important;
                        text-decoration: none;
                    }
                    
                /*.btn-success {background-image: linear-gradient(to right, #c8cfe9 0%, #b8e0d2  51%, #c4df9b  100%)}*/
                    .btn-success {
                        background-color: #26B99A;
                        font-size: 12px;
                        font-weight: 900;
                        padding: 15px 25px;
                        text-align: center;
                        text-transform: uppercase;
                        transition: 0.5s;
                        background-size: 200% auto;
                        border-radius: 5px;
                        color: #ffffff;
                        /*display: block;*/
                    }
                    
                    .btn-success:hover {
                        background-color: #099578;
                        background-position: right center; /* change the direction of the change here */
                        color: #ffffff !important;
                        text-decoration: none;
                    }
                
                /*.btn-default {background-image: linear-gradient(to right, #eabbbd 0%, #ff959a  51%, #fe363f  100%)}*/
                .btn-default {
                    background-color: #ff6666;
                        font-size: 12px;
                        font-weight: 900;
                        padding: 15px 25px;
                        text-align: center;
                        text-transform: uppercase;
                        transition: 0.5s;
                        background-size: 200% auto;
                        color: #ffffff;            
                        border-radius: 5px;
                        /*display: block;*/
                }
                
                .btn-default:hover {
                    background-color: #B81111;
                        background-position: right center; /* change the direction of the change here */
                        color: #ffffff !important;
                        text-decoration: none;
                }
                
                .btn-dark {
                    background-color: #00ff00;
                        font-size: 12px;
                        padding: 15px 25px;
                        font-weight: 900;
                        text-align: center;
                        text-transform: uppercase;
                        transition: 0.5s;
                        background-size: 200% auto;
                        color: #000000 !important;            
                        border-radius: 5px;
                        /*display: block;*/
                }
                
                .btn-dark:hover {
                    background-color: #0056a2;
                        background-position: right center; /* change the direction of the change here */
                        color: #ffffff !important;
                        text-decoration: none;
                }
                .switch {
                position: relative;
                display: inline-block;
                width: 47px;
                height: 22px;
                }

                .switch input { 
                opacity: 0;
                width: 0;
                height: 0;
                }

                .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
                }

                .slider:before {
                position: absolute;
                content: "";
                height: 15px;
                width: 15px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
                }

                input:checked + .slider {
                background-image: linear-gradient(to right, #00c183 0%, #006185  51%, #00c183  100%);
                }

                input:focus + .slider {
                box-shadow: 0 0 1px;
                }

                input:checked + .slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
                }

                /* Rounded sliders */
                .slider.round {
                border-radius: 34px;
                }

                .slider.round:before {
                border-radius: 50%;
                }
                
                body.nav-md .container.body .col-md-3.left_col {
                    width: 230px;
                    height: 100vh;
                    padding: 0;
                    position: absolute;
                    display: flex;
                    background-color: #658bba;
                    background-image:url('<?php echo base_url('front_img/login.jpg'); ?>') !important; 
                    background-repeat:no-repeat !important;
                    background-size:cover !important;
                    background-position:center left !important;
                    background-attachment: fixed;
                }
                
                .nav.side-menu> li.active > a {
                    color: #ffffff !important;
                    text-shadow: rgb(0 0 0 / 25%) 0 -1px 0;
                    background-color: #3b5392;
                    /* background-image: linear-gradient(to right, #00c183 0%, #006185 51%, #00c183 100%); */
                    /* background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #96A480 ), color-stop(100%, #96A480)), #96A480; */
                    /* background: -webkit-linear-gradient(#96A480, #96A480), #96A480; */
                    /* background: linear-gradient(#96A480, #96A480), #96A480; */
                    /* -webkit-box-shadow: rgb(0 0 0 / 25%) 0 1px 0, inset rgb(255 255 255 / 16%) 0 1px 0; */
                    /* -moz-box-shadow: rgba(0, 0, 0, 0.25) 0 1px 0, inset rgba(255, 255, 255, 0.16) 0 1px 0; */
                    /* box-shadow: rgb(0 0 0 / 25%) 0 1px 0, inset rgb(255 255 255 / 16%) 0 1px 0; */
                }
                
                #sidebar-menu .fa {
                    color: #ffffff;
                    width: 26px;
                    opacity: .99;
                    display: inline-block;
                    font-family: FontAwesome;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 18px;
                    -webkit-font-smoothing: antialiased;
                    -moz-osx-font-smoothing: grayscale;
                }
                
                .nav.side-menu>li>a, .nav.child_menu>li>a {
                    color: #ffffff !important;
                    font-weight: 500;
                }
                
                .right_col {
                    min-height: 100vh;
                }
                
                .page-title .title_left h3 {
                    margin: 9px 0;
                    color: #000000 !important;
                }
                
                table.jambo_table thead {
                    /* background: rgba(52, 73, 94, 0.94); */
                    background-color: #0056a2;
                    color: #ffffff;
                }
                
                #sidebar-menu .fa {
                    color: #00ff00;
                    width: 26px;
                    opacity: .99;
                    display: inline-block;
                    font-family: FontAwesome;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 18px;
                    -webkit-font-smoothing: antialiased;
                    -moz-osx-font-smoothing: grayscale;
                }

                .form-control_error
                {
                    background-color: #fff;
                    background-image: none;
                    border: 1px solid #E01A39;
                    border-radius: 0;
                    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
                    color: #555;
                    display: block;
                    font-size: 14px;
                    height: 50px;
                    line-height: 1.42857;
                    padding: 6px 12px;
                    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
                    width: 100%; 
                }
            </style>
            
    </head>
    <script type="text/javascript">
        function MM_jumpMenu(targ, selObj, restore) { //v3.0
            eval(targ + ".location='" + selObj.options[selObj.selectedIndex].value + "'");
            if (restore)
                selObj.selectedIndex = 0;
        }
    </script>
    <?php
    $iUserType = $this->session->userdata('iUserTypebackendsession');
    $uType = $this->session->userdata('uTypebackendsession');
    if ($iUserType == '' || $uType != 'colomboBACKUSER') {
        $data = array();
        $data['error'] = '';
        $this->load->view('adminpanel/login_form', $data);
        exit();
    }
    $uUserID = $this->session->userdata('userbackendsession');
    ?>
    
   
    
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                         <!--<div class="navbar nav_title" style="border: 0; height:auto; padding-bottom:10px;">-->
                         <!--    <a href="#" class="site_title"><img src="<?php echo base_url("front_img/logo.png"); ?>" alt=""/></a>-->
                         <!--</div>-->
                         <!--<div class="clearfix"></div>-->
                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                
                                 <img src="<?php echo base_url("front_img/logo.png"); ?>" alt="" class="img-responsive center-block" style="margin-bottom: 0px; width: 60px; margin-top: 20px;">
                                
                                <!--<h3>General</h3>-->
                                <ul class="nav side-menu">
                                    <?php echo $this->dynamic_menu->build_menu($this->session->userdata('iUserTypebackendsession')); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu" style="height:50px;">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="col-md-8" style="text-align:center;"><a href="http://tekgeeks.net/"><img src="<?php echo base_url("assets/images/tg-logo2.png"); ?>" alt="" style="position: relative; top: -10px;"></a></div>
                            <ul class="nav navbar-nav navbar-right" >
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <!--<img src="<?php echo base_url("assets/images/img.jpg"); ?>" alt="">--> 
                                        <?php echo $this->session->userdata('vUserNamebackendsession'); ?>
                                        &nbsp;<span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                        <li><a href="<?php echo base_url() . "adminpanel/master/profile/update_profile/$uUserID" ?>">  Profile</a>
                                        </li>
                                        <li><a href="<?php echo base_url() . "adminpanel/login/logout" ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->