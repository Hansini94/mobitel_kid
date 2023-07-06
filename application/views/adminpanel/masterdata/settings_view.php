<?php
 if ($cSaveStatus == "E") {
     
     $id = $edit_data['id']; 
     //print_r($edit_data);exit();
     $iPurchaselimit = $edit_data['iPurchaselimit'];
     $iReservationperiod = $edit_data['iReservationperiod'];
     $cEnable = $edit_data['cEnable'];
 } else {
    $id = "";   
	$iPurchaselimit = ""; 
    $iReservationperiod = ""; 
    $cEnable = "Y";
}

?>
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div style="text-align:center;">
            <div id="dialog" title="Error" style="display: none;">
                <p>Please fill required information.</p>
            </div>
            <?php
            $showinput = 1;
            if ($this->session->flashdata('message_saved') != "") {
                $showinput = 0;
                ?>
            <div style="color:#096;">
                <?php echo $this->session->flashdata('message_saved'); ?>
            </div>
            <?php
            }
            ?>
            <?php
            if ($this->session->flashdata('message_restricted') != "") {
                $showinput = 0;
                ?>
            <div style="color:#F00;">
                <?php echo $this->session->flashdata('message_restricted'); ?>
            </div>
            <?php
            }
            ?>
            <?php
            if ($this->session->flashdata('message_error') != "" || validation_errors() != "") {
                $showinput = 0;
                ?>
            <div style="color:#F00;">
                <?php
                    echo validation_errors('<div style="height:22px; padding:0px; margin-bottom:5px; " class="alert alert-danger" role="alert">', '</div>');
                    echo $this->session->flashdata('message_error');
                    ?>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_title">
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <h2>Settings</h2>
                        </div>
                    <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="edit_data" name="edit_data" action="<?php echo base_url('adminpanel/master/settings/update_settings'); ?>" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vProTitle">Purchase Limit ( Rs. )<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="number" id="iPurchaselimit" name="iPurchaselimit" value="<?php echo $iPurchaselimit; ?>" class="form-control col-md-7 col-xs-12" required> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="vProTitle">Reservation period ( Days ) <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="number" id="iReservationperiod" name="iReservationperiod" value="<?php echo $iReservationperiod; ?>" class="form-control col-md-7 col-xs-12" required> 
                                    </div>
                                </div>
                            </div>
                            
                                                     
                            <div class="clearfix"></div>
                                                
                           
                           
                            <div style="clear:both;"></div>
                            <div class="ln_solid" style="margin-top:2px; margin-bottom:8px;"></div>
                            <div class="form-group" style="margin-bottom:0px;">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                    
                                    <input type="hidden" id="cEnable" name="cEnable" value="Y">
                                    <input type="hidden" id="cSaveStatus" name="cSaveStatus" value="<?php echo $cSaveStatus; ?>">
                                    <button type="button" class="btn btn-default pull-right"
                                        onclick="document.location.href = '<?php echo base_url('adminpanel/master/settings'); ?>';">Cancel</button>
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <style>
        .DTTT_container {
            display: none !important;
            visibility: hidden !important;
        }

        .alert {
            margin-left: 161px;
            border-style: none;
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</div>
