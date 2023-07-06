<!doctype html>
<html lang="en">
  <head>
    <?php
      if ($meta == 1) {
        $meta = get_meta('Home');
      } else if ($meta == 2) {
          $meta = get_meta('Terms_conditions');
      } else {
          $meta = get_meta('Home');
      }
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?php echo $meta[0]->vMeta_description; ?>" />
    <link rel="canonical" href="<?php echo $meta[0]->vOg_url; ?>" />
    <meta property="og:site_name" content="<?php echo $meta[0]->vTitle; ?> | <?php echo $meta[0]->vPage_name; ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $meta[0]->vOg_title; ?>" />
    <meta property="og:description" content="<?php echo $meta[0]->vOg_description; ?>" />
    <meta property="og:url" content="<?php echo $meta[0]->vOg_url; ?>" />
    <title><?php echo $meta[0]->vTitle; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="<?php echo base_url("assets/frontend/css/mobitel_kid.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/frontend/css/mediaquery.css"); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- <title>MOBITEL KIDS</title> -->

    <!--favicon-->
   <link href="https://www.mobitel.lk/sites/all/themes/mobitel/templates/new-home/images/favicon.png" href="" rel="icon">
    <!--favicon-->

    <!-- font awsom -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <!-- font awsom --> 

    <!--loading effect-->
    <link rel="stylesheet" href="<?php echo base_url("assets/frontend/css/loading_styles.css"); ?>" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/frontend/css/aos.css"); ?>" type="text/css" media="screen"/>
    <!--loading effect-->

    <!--scroll bar style-->
    <style>

      ::-webkit-scrollbar {
        background: #000000;
        height: 5px;
        width: 5px;
      }

      ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 2px #002367;
      }

      ::-webkit-scrollbar-thumb {
        background: #002367;
        border-radius: 2px;
      }

      ::-webkit-scrollbar-thumb:hover {
        background: #002367; 
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

      .modal-loading {
                display:    none;
                position:   fixed;
                z-index:    1000;
                top:        0;
                left:       0;
                height:     100%;
                width:      100%;
                background: rgba( 255, 255, 255, .8 ) 
                    url("<?php echo base_url('assets/frontend/images/FhHRx.gif'); ?>") 
                    50% 50% 
                    no-repeat;

            }

            /* When the body has the loading class, we turn
               the scrollbar off with overflow:hidden */
            section.loading .modal-loading {
                overflow: hidden;   
            }

            /* Anytime the body has the loading class, our
               modal element will be visible */
            section.loading .modal-loading {
                display: block;
            }
    </style>
    <!--scroll bar style-->


  </head>
  <body>

     
  <!--=============================================-->
  <!--===================header====================-->

    <!-- header section -->
