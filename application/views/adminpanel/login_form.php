<!DOCTYPE html>
<html lang="en">
    <?php //echo print_r($data); exit();?> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>.: CMS - MOBITEL KIDS :.</title>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/fonts/css/font-awesome.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/animate.min.css"); ?>" rel="stylesheet">

        
        <link type="image/x-icon" href="https://www.mobitel.lk/sites/default/files/favicon_1.ico" rel="shortcut icon"/>
        <!-- Custom styling plus plugins -->
        <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/icheck/flat/green.css"); ?>" rel="stylesheet">
        <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
         <!-- <script src='https://www.google.com/recaptcha/api.js?hl=en'></script> --> 
        <script type = "text/javascript" >
            history.pushState(null, null, 'login');
            window.addEventListener('popstate', function(event) {
                history.pushState(null, null, 'login');
            });
        </script>
        <!-- cptcha -->
        <script src='https://www.google.com/recaptcha/api.js?hl=en'></script>  
        <!-- cptcha End -->
        
        
         <style>
            
            body{
                height: 100vh !important;
                background-image:url('<?php echo base_url("front_img/login.jpg"); ?>') !important;
                background-repeat:no-repeat !important;
                background-size:cover !important;
                background-position:center center !important;
            }
            
            #login {
                z-index: 22;
                background-color: #0a0944;
                /*background-image:url('<?php echo base_url("assets/images/login_bg.jpg"); ?>') !important;*/
                /*background-repeat:no-repeat !important;*/
                /*background-size:cover !important;*/
                /*background-position:center bottom !important;*/
            }
        
                    #extr-page #main {
                        padding-top: 0px;
                    }
                    
                    #main {
                        margin-left: 220px;
                        padding: 0;
                        padding-bottom: 0px;
                        min-height: 500px;
                        position: relative;
                    }
                    
                    #content {
                        padding-top: 0px !important;
                        padding: 10px 14px;
                        position: relative;
                        height: 100vh;
                    }
                    
                    .login_form_div{
                        position: relative;
                        height: 100vh;
                        background-color: #10722f;
                    }
                    
                    .well {
                        margin-top: 40% !important;
                        background-color: #fbfbfb;
                        border: transparent;
                        box-shadow: none;
                        -webkit-box-shadow: none;
                        -moz-box-shadow: none;
                        position: relative;
                    }
                    
                    .client-form header {
                        padding: 15px 13px;
                        margin: 0;
                        border-bottom-style: solid;
                        border-bottom-color: transparent;
                        background: #10722f;
                    }
                    
                    .smart-form fieldset {
                        display: block;
                        padding: 25px 14px 5px;
                        border: none;
                        background: #10722f;
                        position: relative;
                    }
                    
                    .smart-form footer {
                        display: block;
                        padding: 7px 14px 15px;
                        border-top: transparent;
                        background: #10722f !important;
                    }
                    
                    .smart-form .input input, .smart-form .select select, .smart-form .textarea textarea {
                        display: block;
                        box-sizing: border-box;
                        -moz-box-sizing: border-box;
                        width: 100%;
                        height: 45px;
                        line-height: 32px;
                        padding: 5px 10px;
                        outline: 0;
                        border-width: 1px;
                        border-style: solid;
                        border-color: #999999;
                        border-radius: 5px;
                        background: #fff;
                        font: 13px/16px 'Open Sans',Helvetica,Arial,sans-serif;
                        color: #000000;
                        appearance: normal;
                        -moz-appearance: none;
                        -webkit-appearance: none;
                    }
                    
                    .smart-form .icon-append, .smart-form .icon-prepend {
                        position: absolute;
                        top: 12px;
                        width: 22px;
                        height: 22px;
                        font-size: 14px;
                        line-height: 22px;
                        text-align: center;
                    }
                    
                    .smart-form .label {
                        display: block;
                        margin-bottom: 6px;
                        line-height: 19px;
                        font-weight: 900;
                        font-size: 13px;
                        color: #ffffff;
                        text-align: left;
                        white-space: normal;
                    }
                    
                    /*.btn-primary {background-image: linear-gradient(to right, #c8cfe9 0%, #b8e0d2  51%, #c4df9b  100%)}*/
                    .btn-primary {
                        background-color: #00ff00;
                        font-size: 14px;
                        padding: 15px 25px;
                        text-align: center;
                        font-weight: 900;
                        text-transform: uppercase;
                        transition: 0.5s;
                        background-size: 200% auto;
                        color: #000000;            
                        border-radius: 5px;
                        /*display: block;*/
                    }
                    
                    .btn-primary:hover {
                        background-color: #0056a2;
                        background-position: right center; /* change the direction of the change here */
                        color: #ffffff;
                        text-decoration: none;
                    }
                    
                    /*.btn-primary {*/
                    /*    color: #fff;*/
                    /*    background-color: #000000;*/
                    /*    border-color: #00000;*/
                    /*    font-weight: 900 !important;*/
                    /*    padding: 10px !important;*/
                    /*    height: auto !important;*/
                    /*    border-radius: 5px;*/
                    /*    webkit-transition: all 500ms ease;*/
                    /*    -moz-transition: all 500ms ease;*/
                    /*    -ms-transition: all 500ms ease;*/
                    /*    -o-transition: all 500ms ease;*/
                    /*    transition: all 500ms ease;*/
                    /*}*/
                    
                    /*.btn-primary:hover{*/
                    /*    color: #fff;*/
                    /*    background-color: #10722f;*/
                    /*    border-color: #ffffff;*/
                    /*}*/
                    
                    .main_heading {
                        font-family: 'Oswald' !important;
                        font-weight: 900;
                        text-align: center;
                        text-transform: uppercase;
                        color: #ffffff;
                        font-size: 40px;
                        margin-bottom: 15px;
                    }
                    
                    .login_heading{
                        position: absolute;
                        left: 100px;
                        bottom: 30px;
                        width: 625px;
                    }
                    
                    .form-control {
                        display: block;
                        width: 100%;
                        height: 30px;
                        padding: 6px 20px;
                        font-size: 12px;
                        line-height: 1.42857143;
                        background-color: #fff;
                        background-image: none;
                        border: 1px solid #0056a3 !important;
                        border-radius: 10px !important;
                        -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
                        box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
                        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
                        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
                        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
                    }
                    
                    </style>
                    
    </head>
    <body style="background:#F7F7F7;">
        <div class="">
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            
             <div class="login_heading">
                 
                  <img src="<?php echo base_url("front_img/login_item.png"); ?>" alt="" class="img-responsive" style="margin-bottom: 0px; width: 480px;">
                  
                <h1 class="main_heading aos-init aos-animate" data-aos="fade-up" style="text-align: left;">
                    CMS - 
                    Mobitel Kids
                </h1>
                <p style="color: #ffffff;">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.             </div>
            
            <div id="wrapper">
                <div id="login" class="animate form">
                    <section class="login_content">
                        <?php
                        echo form_open('adminpanel/login/login_validation');
                        ?>
                        <form>
                            <img src="<?php echo base_url("front_img/logo.png"); ?>" alt="" class="img-responsive center-block" style="margin-bottom: 0px;"> 
                            <br>
                            <h2 style="text-align: left; margin-bottom: 10px; margin-top: 0px;"><b style="color:#ffffff;">LOGIN</b></h2>
                            <div>
                                <input class="form-control" style="border: 2px solid #ff7400; font-weight:500;" name="vUserName" placeholder="Username" type="text" value ="<?php echo set_value('vUserName') ?>" required />
                            </div>
                            <div>
                                <input type="password" style="border: 2px solid #ff7400; font-weight:500;" name="pPassword" class="form-control" placeholder="Password" required />
                            </div>
                            <div >
                                <div style="text-align: center;">
                                    <div class="g-recaptcha" data-sitekey="6Lf6jzAgAAAAAMlq6asGZsBZ7EJgHBSSOnLL4dHb" style="/*-webkit-transform:scale(0.77);transform:scale(0.77); */display: inline-block;"></div>
                                </div>
                                <!-- <a class="btn btn-default submit" href="index.html">Log in</a>-->
                                <div style="margin-top: 0px; width: 100%; margin-top: 20px;">
                                    <button type="submit" id="login_submit" class="btn btn-primary submit" name="login_submit" style="width: 100%;">Log in</button>
                                    <!--<a class="reset_pass" href="#">Lost your password?</a>-->
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <?php
                            echo validation_errors('<div style="height:25px; padding:0px;" class="alert alert-danger" role="alert">', '</div>');
                            ?>
                            <?php if ($error != '') { ?>
                                <div style="height:25px; padding:0px;" class="alert alert-danger" role="alert">
                                    <?php echo $error; ?>
                                </div>
                            <?php } ?>        
                            <div class="separator" style="border:none;">
                            <!--<p class="change_link">New to site?
                                <a href="#toregister" class="to_register"> Create Account </a>
                            </p>-->
                                <!--<div class="clearfix"></div>-->
                                <!-- <br />-->
    <!--<h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>-->
                                <p style="color:#999999; text-shadow:none; padding:5px;">Solution by <a href="http://www.tekgeeks.net" style="color:#999999;" target="_blank">TekGeeks</a></p>
                            </div>
                            
                        </form>
                        <!-- form -->
                        <?php
                        echo form_close();
                        ?>
                    </section>
                    </div>
                    <!-- content -->
                </div>
                <div id="register" class="animate form">
                    <section class="login_content">
                        <form>
                            <h1>Create Account</h1>
                            <div>
                                <input type="text" class="form-control" placeholder="Username" required />
                            </div>
                            <div>
                                <input type="email" class="form-control" placeholder="Email" required />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" required />
                            </div>
                            <div>
                                <a class="btn btn-default submit" href="index.html">Submit</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <p class="change_link">Already a member ?
                                    <a href="#tologin" class="to_register"> Log in </a>
                                </p>
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>
                                    <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                        <!-- form -->
                    </section>
                    <!-- content -->
                </div>
            </div>
        </div>
    </body>
</html>